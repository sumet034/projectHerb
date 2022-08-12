/*---------- formLogin -----------*/

var modal = document.getElementById('formloginHerb');

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modalx = document.getElementById('feedherb');

window.onclick = function (event) {
    if (event.target == modalx) {
        modal.style.display = "none";
    }
}

/*---------- formLogin -----------*/
$(document).ready(function () {
    $('#message').keyup(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });   
    /*  $('#action-button').click(() =>{
    		console.log('Clicked!'); //เอาไว้ เช็คกปุ่ม
	}) */
    /* show_feature(); */
    $(".delete-btn").click(function (e) {
        var herbID = $(this).data('id');
        e.preventDefault();
        deleteConfirm(herbID);
    })

    function deleteConfirm(herbID) {
        Swal.fire({
            title: 'คุณแน่ใจนะ?',
            text: "ช้อมูลจะถูกลบถาวร!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่ ต้องการลบ!',
            showLoaderOnConfirm: true,
            preConfirm: function () {
                return new Promise(function (_resolve) {
                    $.ajax({
                            url: 'delete.php',
                            type: 'GET',
                            data: 'herbID=' + herbID,
                        })
                        .done(function () {
                            Swal.fire({
                                title: 'เรียบร้อย',
                                text: 'ลบข้อมูลสมุนไพรสำเร็จ!',
                                icon: 'success',
                            }).then(() => {
                                document.location.href = 'index.php';
                            })
                        })
                        .fail(function () {
                            Swal.fire('เอิ่ม...', 'เหมือน ajax หรือ Jquery จะมีปัญหา !', 'error')
                            window.location.reload();
                        });
                });
            },
        });
    }


});

/*---------- dataTable -----------*/
$('#myTable').dataTable({
    "oLanguage": {
        "sLengthMenu": "แสดง _MENU_ แถว",
        "sZeroRecords": "ไม่พบข้อมูล",
        "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ แถว",
        "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 แถว",
        "sInfoFiltered": "(จากแถวทั้งหมด _MAX_ แถว)",
        "sSearch": "ค้นหา :",
        "aaSorting": [
            [0, 'desc']
        ],
        "oPaginate": {
            "sFirst": "หน้าแรก",
            "sPrevious": "ก่อนหน้า",
            "sNext": "ถัดไป",
            "sLast": "หน้าสุดท้าย"
        },
    }
});
$('#myTable').dataTable();
/*---------- dataTable -----------*/

$(document).on('click', '#myImg', function () {
    let loImg = "../../../herb/img/imgHerb/";
    let naImg = $(this).data("img");
    $imgsrc = loImg + naImg; /* $('#myImg').attr('src'); */
    /* alert($imgsrc); */
    Swal.fire({
        imageUrl: $imgsrc,
        imageWidth: 500,
        showConfirmButton: false,
        imageAlt: naImg,
    })
});

$(document).on('click', '#feedImg', function () {
    let loFeed = "../../../herb/img/imgFeed/";
    let naFeed = $(this).data("feed");
    $feedsrc = loFeed + naFeed; /* $('#myImg').attr('src'); */
    /* alert($feedsrc); */
    Swal.fire({
        imageUrl: $feedsrc,
        imageWidth: 500,
        showConfirmButton: false,
        imageAlt: naFeed,
    })
});

/*---------- formEdit ------------*/

/*---------- formEdit ------------*/
$(document).on('click', '#btn-save', function () {
    var herbID = $(this).data("id");
    var feature_leaves = $('#feature_leaves').is(':checked');
    var feature_flower = $('#feature_flower').is(':checked');
    var feature_fruit = $('#feature_fruit').is(':checked');
    var feature_haulm = $('#feature_haulm').is(':checked');
    var feature_rootHerb = $('#feature_rootHerb').is(':checked');
    var action = "feature_switch";
    if (feature_leaves == true) {
        feature_leaves = 1;
    } else {
        feature_leaves = 0;
    }
    if (feature_flower == true) {
        feature_flower = 1;
    } else {
        feature_flower = 0;
    }
    if (feature_fruit == true) {
        feature_fruit = 1;
    } else {
        feature_fruit = 0;
    }
    if (feature_haulm == true) {
        feature_haulm = 1;
    } else {
        feature_haulm = 0;
    }
    if (feature_rootHerb == true) {
        feature_rootHerb = 1;
    } else {
        feature_rootHerb = 0;
    }
    $.ajax({
        url: "action.php",
        method: "POST",
        data: {
            herbID: herbID,
            feature_leaves: feature_leaves,
            feature_flower: feature_flower,
            feature_fruit: feature_fruit,
            feature_haulm: feature_haulm,
            feature_rootHerb: feature_rootHerb,
            action: action
        }
    });


    if ($('.n-herb').val().length == '') {

        Swal.fire(
            'แจ้งเตือน!',
            'กรุณากรอกชื่อพืชสมุนไพร',
            'warning'
        )
    }


});
/*---------- formEdit ------------*/








let imgInput = document.getElementById('imgInput');
let img2 = document.getElementById('img2');
let img3 = document.getElementById('img3');
let img4 = document.getElementById('img4');
let img5 = document.getElementById('img5');
let img6 = document.getElementById('img6');

let previewImg = document.getElementById('previewImg');
let pre_leaves = document.getElementById('pre_leaves');
let pre_flowerx = document.getElementById('pre_flowerx');
let pre_fruitx = document.getElementById('pre_fruitx');
let pre_haulmx = document.getElementById('pre_haulmx');
let pre_rootHerbx = document.getElementById('pre_rootHerbx');

imgInput.onchange = function (_evt) {
    const [file] = imgInput.files;
    if (file) {
        previewImg.src = URL.createObjectURL(file);
    }
}

img2.onchange = function (_evt) {
    const [file] = img2.files;
    if (file) {
        pre_leaves.src = URL.createObjectURL(file);
    }
}

img3.onchange = function (_evt) {
    const [file] = img3.files;
    if (file) {
        pre_flowerx.src = URL.createObjectURL(file);
    }
}

img4.onchange = function (_evt) {
    const [file] = img4.files;
    if (file) {
        pre_fruitx.src = URL.createObjectURL(file);
    }
}

img5.onchange = function (_evt) {
    const [file] = img5.files;
    if (file) {
        pre_haulmx.src = URL.createObjectURL(file);
    }
}

img6.onchange = function (_evt) {
    const [file] = img6.files;
    if (file) {
        pre_rootHerbx.src = URL.createObjectURL(file);
    }
}



let imgfeed = document.getElementById('imgfeed');
let feedpreview = document.getElementById('feedpreview');

imgfeed.onchange = function (_evt) {
    const [file] = imgfeed.files;
    if (file) {
        feedpreview.src = URL.createObjectURL(file);
    }
}

/*---------- formEdit ------------*/