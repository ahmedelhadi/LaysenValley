var config = {
  '.chosen-select'   : {rtl: true, create_option: true, skip_no_results: true ,no_results_text : 'لاتوجد سجلات',single_text : 'إختر من القائمة ',no_result_text:'لاتوجد سجلات',create_option_text:'أضف '},
  '.chosen-select2'  : {rtl: true, create_option: true, skip_no_results: true ,no_results_text : 'لاتوجد سجلات',single_text : 'إختر من القائمة ',no_result_text:'لاتوجد سجلات',create_option_text:'أضف',multiple_text:"إختر من قائمة المؤلفين "},
  '.chosen-select3'  : {rtl: true, create_option: false, skip_no_results: false ,no_results_text : 'لاتوجد سجلات',single_text : 'إختر من القائمة ',no_result_text:'لاتوجد سجلات',create_option_text:'أضف',multiple_text:"إختر من قائمة المؤلفين "}
}
for (var selector in config) {
  $(selector).chosen(config[selector]);
}
