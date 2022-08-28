<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use DB;
use Validator;
use Session;
use Redirect;
use Carbon\Carbon;
use Auth;
use App;

use App\Models\User;
use App\Models\Log;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {



        return view('admin.index');

    }

    // public function getSubject()
    // {

    //     $dataFromPage = file_get_contents(__DIR__ . '/SaudiClassification.json');
    //     $subjects = json_decode($dataFromPage, true);


    //     foreach ($subjects as $index => $subject) {

    //         if ($subject['LEVEL1']) {

    //             $title  = array();
    //             $title['ar'] = $subject['Column4'];
    //             $title['en'] = $subject['Column3'];

    //             $region1 = Subject::create(['title' => $title ,'slug' => $subject['Column2'],'code' => $subject['LEVEL1'] ,'is_active' => 1 , 'level'=> 1  ]);
    //         }


    //         if ($subject['LEVEL2']) {

    //             $title  = array();
    //             $title['ar'] = $subject['Column8'];
    //             $title['en'] = $subject['Column7'];

    //             $region2 = Subject::create(['title' => $title ,'slug' => $subject['Column6'] ,'code' => $subject['LEVEL2'] ,'is_active' => 1 , 'level'=> 2  ,  'subject_id' => $region1->id  ]);
    //         }

    //         if ($subject['LEVEL3']) {

    //             $title  = array();
    //             $title['ar'] = $subject['Column12'];
    //             $title['en'] = $subject['Column11'];

    //             $region3 = Subject::create(['title' => $title ,'slug' => $subject['Column10'],'code' => $subject['LEVEL3'] ,'is_active' => 1 , 'level'=> 3  ,  'subject_id' => $region2->id  ]);
    //         }

    //         if ($subject['LEVEL4']) {

    //             $title  = array();
    //             $title['ar'] = $subject['Column16'];
    //             $title['en'] = $subject['Column15'];

    //             $region4 = Subject::create(['title' => $title ,'slug' => $subject['Column14'],'code' => $subject['LEVEL4'] ,'is_active' => 1 , 'level'=> 3  ,  'subject_id' => $region3->id  ]);
    //         }

    //     }

    //     return 'done';

    // }



    public function getSubject()
    {

        $dataFromPage = file_get_contents(__DIR__ . '/1.json');
        $subjects = json_decode($dataFromPage, true);


        foreach ($subjects as $index => $subject) {


            if ($subject['LEVEL1']) {

                $title  = array();
                $title['ar'] = $subject['Column4'];
                $title['en'] = $subject['Column3'];

                $region1 = Subject::create(['title' => $title ,'slug' => $subject['Column2'],'code' => $subject['LEVEL1'] ,'is_active' => 1 , 'level'=> 1  ]);
            }


            if ($subject['LEVEL2']) {

                $title  = array();
                $title['ar'] = $subject['Column8'];
                $title['en'] = $subject['Column7'];

                $region2 = Subject::create(['title' => $title ,'slug' => $subject['Column6'] ,'code' => $subject['LEVEL2'] ,'is_active' => 1 , 'level'=> 2  ,  'subject_id' => $region1->id  ]);
            }

            if ($subject['LEVEL3']) {

                $title  = array();
                $title['ar'] = $subject['Column12'];
                $title['en'] = $subject['Column11'];

                $region3 = Subject::create(['title' => $title ,'slug' => $subject['Column10'],'code' => $subject['LEVEL3'] ,'is_active' => 1 , 'level'=> 3  ,  'subject_id' => $region2->id  ]);
            }

            if ($subject['LEVEL4']) {

                $title  = array();
                $title['ar'] = $subject['Column16'];
                $title['en'] = $subject['Column15'];

                $region4 = Subject::create(['title' => $title ,'slug' => $subject['Column14'],'code' => $subject['LEVEL4'] ,'is_active' => 1 , 'level'=> 4  ,  'subject_id' => $region3->id  ]);
            }

        }

        return 'done';

    }



    /**
     * profile function.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('admin.profile.index');
    }



    /**
     * language function.
     *
     * @return \Illuminate\Http\Response
     */
    public function language()
    {
        $words = include(App::langPath() . '/ar/lang.php');
        $values = include(App::langPath() . '/ar/file.php');

        return view('admin.language.index',compact('words','values'));

    }

    /**
     * language function.
     *
     * @return \Illuminate\Http\Response
     */
    public function languageStore(Request $request)
    {


        $fp = fopen(App::langPath() . '/ar/file.php', 'w');
        fwrite($fp, '<?php'.PHP_EOL);
        fwrite($fp, 'return ['.PHP_EOL);

        foreach ($request->words as $key => $value) {
            fwrite($fp, "'".$key."'=>'".$value."'," .PHP_EOL);
        }
        fwrite($fp, '];'.PHP_EOL);
        fwrite($fp, PHP_EOL.'?>');

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));
        return Redirect::back();

    }


    /**
     * notification language function.
     *
     * @return \Illuminate\Http\Response
     */
    public function notifications()
    {
        $words = include(App::langPath() . '/ar/notification.php');
        return view('admin.language.notification',compact('words'));

    }

    /**
     * notification language function.
     *
     * @return \Illuminate\Http\Response
     */
    public function notificationStore(Request $request)
    {


        $fp = fopen(App::langPath() . '/ar/notification.php', 'w');
        fwrite($fp, '<?php'.PHP_EOL);
        fwrite($fp, 'return ['.PHP_EOL);

        foreach ($request->words as $key => $value) {
            fwrite($fp, "'".$key."'=>'".$value."'," .PHP_EOL);
        }
        fwrite($fp, '];'.PHP_EOL);
        fwrite($fp, PHP_EOL.'?>');

        Session::flash('status', __('admin.success'));
        Session::flash('message', __('admin.update_success'));
        return Redirect::back();

    }



    public function getDnas(Request $request)
    {

        // $dnas = Dna::where('project_id','da992e75-c192-4617-8f82-e690d9862087')->get();

        // foreach ($dnas as $key => $dna) {
        //     $dna->forceDelete();
        // }

        // return 'done'; 


        if ($request->project_id && $request->file) {

            set_time_limit(10000);

            $dataFromPage = file_get_contents(__DIR__ . '/'.$request->file);
            $dnas = json_decode($dataFromPage, true);
            $titles = array();

            foreach ($dnas as $index => $dna) {
            
                // $objective = Objective::where('title->ar','يعرف')->first();


                if ($dna) {


                    $objective_title = null;

                    // get the objective and objective_title
                    if (isset($dna["objective_all"])) {

                        $strArray = explode(' ',$dna["objective_all"]);
                        $objective = Objective::where('title->ar',$strArray[1])->first();

                        if (!$objective) {
                            $obj_title  = array();
                            $obj_title['ar'] = $strArray[1];
                            $obj_title['en'] = $strArray[1];

                            $objective = Objective::create([
                                            'title' => $obj_title ,
                                            'desc' => $obj_title ,
                                            'slug' => Str::slug($strArray[1]) ,
                                            'is_active' => 0 ,
                                        ]);
                        }

                        if (isset($objective_title[3])) {

                        $objective_title = explode (' ', $dna["objective_all"], 3);
                            $objective_title = $objective_title[2];
                        }
                    }elseif (!isset($dna["objective_all"]) && isset($dna["title"])) {

                        if (strlen($dna["title"]) == strlen(utf8_decode($dna["title"])))
                        {
                            $objective = Objective::findOrFail(120);
                        }
                    }




                    //title
                    $title  = array();
                    $title['ar'] = $dna['title'];
                    $title['en'] = null;

                    //create dna
                    $dnaCheck = Dna::where('objective_title',$dna['title'])->first() ?? [];

                    if(!$dnaCheck){
            
                        $newDna = Dna::create([
                            'id' => Str::uuid() ,
                            'title' => $title ,
                            'video' => $dna['video'] ?? '' ,
                            'objective_id' => $objective->id ?? 6 ,
                            'objective_title' => $objective_title ?? $dna['title'] ,
                            'project_id'=> $request->project_id ,
                            'user_id' => $request->user_id ??  15,
                            'dna_introduction' => 'dna_introduction',
                            'dna_conclusion' => 'dna_conclusion',
                            'status_id' => 14
                        ]);

                        //$newDna->thumbnail = $newDna->getVimeoThumb();
                        //$newDna->save();
                    }else{
                        
                        //$dnaCheck->thumbnail = $dnaCheck->getVimeoThumb();
                        //$dnaCheck->save();
                    }

                }



            }
        }


        set_time_limit(30);

        //$this->getThumbnail();
        return 'Done';

    }

    public function getThumbnail(){
        //set_time_limit(10000);
        $dnas = Dna::all();
        foreach($dnas as $dna){
            if($dna->video!=''){
                $dna->thumbnail = $dna->getVimeoThumb();
                $dna->save();
            }
        }
        return 'Complate';
    }

    public function get_general_partner(){
        $dataFromPage = file_get_contents(__DIR__ . '/GeneralPartner.json');
            $GeneralPartners = json_decode($dataFromPage, true);
            $titles = array();
            //return $GeneralPartners;
            foreach ($GeneralPartners as $index => $GeneralPartner) {
                GeneralPartner::create([
                    'title'=>$GeneralPartner['title']
                ]);
            }
    }



}
