import axios from 'axios';
import jQuery from 'jquery';
import Swal from 'sweetalert2';

window.$ = jQuery;
window.jQuery = jQuery;
window.Swal = Swal;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
