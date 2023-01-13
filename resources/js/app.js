import './bootstrap';
import '../js/form';
import '../js/form';
 
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });