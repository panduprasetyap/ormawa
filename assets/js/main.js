//sweet alert



const flashData = $('.flash-data').data('flashdata');
const flashDataUser = $('.flash-datauser').data('flashdata');

if(flashData) {
    Swal.fire({
        title: 'Data Surat',
        icon: 'success',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
} 
if(flashDataUser) {
    Swal.fire({
        title: 'Data User',
        icon: 'success',
        text: 'Berhasil ' + flashDataUser,
        type: 'success'
    });
} 

//tombol hapus
$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire ({
        title: 'Apakah anda yakin?',
        text: "data surat akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
        if (result.isConfirmed) {
              document.location.href = href;
        }
    });
});





// $('#button-print').on('click', function(e) {
//     const d         = new Printd();

//     const el            = document.getElementById('.table-print')
//     const printCallback = ({ launchPrint }) => launchPrint();

//     d.print(el, printCallback);
// });


