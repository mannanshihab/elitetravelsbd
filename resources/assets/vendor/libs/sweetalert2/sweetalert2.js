import SwalPlugin from 'sweetalert2/dist/sweetalert2';

const Swal = SwalPlugin;

try {
  window.Swal = Swal;
} catch (e) {}

export { Swal };
