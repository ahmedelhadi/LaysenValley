<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Auth;
use Session;
use Redirect;
use Image;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;

use App\Models\Order;
use App\Models\Page;
use App\Models\Log;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ordersQuery = Order::query();

        if ($request->has('trashed')) {
            $ordersQuery = $ordersQuery->onlyTrashed();
        }

        if ($request->has('page_id')) {
            $page_id = $request->page_id;

            $ordersQuery = $ordersQuery->whereHas('pages', function ($query) use ($page_id)  {
                $query->where('page_id',$page_id);
    
            });
        }

        $orders = $ordersQuery->paginate(10);

        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::where('is_active',1)->get();
        return view('admin.orders.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //Requests
        $requests = $request->all();

        //image
        if (isset($requests['image'])) {
            $requests['image'] = $this->uploadImage($requests['image']);
        }

        //Create Slug
        $requests['slug']  = Str::slug($requests['title']['ar']);

        $order = Order::create($requests);

        $page = Page::findorfail($request->page_id);

        $page->orders()->sync($order->id);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.create_success'));

        return redirect()->to(route('admin.orders.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show',compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $pages = Page::where('is_active',1)->get();

        return view('admin.orders.edit',compact('order','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        //Requests
        $requests = $request->all();

        //image
        if (isset($requests['image'])) {
            $requests['image'] = $this->uploadImage($requests['image']);
        }

        //$requests['slug']  = Str::slug($requests['title']['ar']);

        $order = Order::findOrFail($id);
        $order = $order->update($requests);
        $order = Order::findOrFail($id);

        $page = Page::findorfail($request->page_id);
        $page->orders()->sync($order->id);

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));

        return redirect()->to(route('admin.orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect()->to(route('admin.orders.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $order = Order::withTrashed()->find($id);

        $order->forceDelete();

        Session::flash('status', __('admin.danger'));
        Session::flash('message', __('admin.delete_success'));

        return redirect(route('admin.orders.index'));
    }


    /**
     * Restore the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $order = Order::withTrashed()->find($id);

        $order->restore();

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.restore_success'));

        return redirect(route('admin.orders.index'));
    }

    /**
     * uploading and resize image.
     *
     */

    public function uploadImage($file)
    {
        $destinationPath = 'uploads';
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        Image::make($file)
            ->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'. $fileName);

        return $destinationPath.'/'.$fileName;
    }
}
