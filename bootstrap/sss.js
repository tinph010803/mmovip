function check_tranid() {
    var zData = $("#check_tranid").serialize();
    $.ajax({
        type: "POST",
        url: "/kiemtra/giaodich.html",
        data: zData,
        success: function(result1) {
            result = JSON.parse(result1);
            document.getElementById("submit").disabled = false;
            if (result.status == '200') {
                $('#result-check').modal('show');
                document.getElementById("ls_magd").innerHTML = result.ls_magd;
                document.getElementById("ls_sdt").innerHTML = result.ls_sdt;
                document.getElementById("ls_sotien").innerHTML = result.ls_sotien;
                document.getElementById("ls_noidung").innerHTML = result.ls_noidung;
                document.getElementById("ls_loaitrochoi").innerHTML = result.ls_loaitrochoi;
                document.getElementById("ls_ketqua").innerHTML = result.ls_ketqua;
                document.getElementById("ls_tiennhan").innerHTML = result.ls_tiennhan;
                document.getElementById("ls_trangthai").innerHTML = result.ls_trangthai;
                document.getElementById("ls_thoigian").innerHTML = result.ls_thoigian;
                setTimeout(function() {
                    $('#result-check').modal('hide');
                }, 150000);
            }
            if (result.status == '404') {
                swal("Thông báo", "Không tồn tại mã giao dịch này!!", "error");
            }
            if (result.status == '99') {
                swal("Thông báo", "Vui lòng nhập đúng mã giao dịch và thử lại!!", "error");
            }
        },
    });
}
$(document).ready(function() {
    $("button[data-action=huongdan]").click((e) => {
        $("#myModal").modal("show");
    });
    $("span[data-action=phan-thuong]").click((e) => {
        $("#modalGift").modal("show");
    });
    $('button[server-action=change]').click(function() {
        let button = $(this);
        let id = button.attr('server-id');
        selection_server = id;
        selection_rate = button.attr('server-rate');
        $('.turn').removeClass('active');
        $(`.turn[turn-tab=${id}]`).addClass('active');
        $('button[server-action=change]').attr('class', 'btn btn-default mt-1 btn-tab');
        button.attr('class', 'btn btn-default mt-1 btn-tab');
    });
    $('button[bot-action=change]').click(function() {
        let button = $(this);
        let id = button.attr('bot-id');
        $('.bot').removeClass('active');
        $(`.bot[bot-tab=${id}]`).addClass('active');
        $('button[bot-action=change]').attr('class', 'btn btn-default mt-1 btn-tab');
        button.attr('class', 'btn btn-default mt-1 btn-tab');
    });
    $('button[server-id=1]').click();
});


function setCookie(cname, cvalue, exhour) {
    var d = new Date();
    d.setTime(d.getTime() + (exhour * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return false;
}
let cookie = getCookie('modal_alert');
if (!cookie) {
    $("#modalAlert").modal("show");
    setCookie('modal_al ert', true, 0.5);
}
let copyStringToClipboard = function (str) {
    navigator.clipboard.writeText(str);
    myNotify = new Notify({
        status: "success",
        title: "Copy số điện thoại thành công",
        text: "Chúc bạn chơi game vui vẻ và húp nhiều!",
        effect: "slide",
        type: 3,
        customClass: "my-notify",
        autoclose: true,
    });
};

function check_ls() {
    $.ajax({
        url: "kiemtra/win.html",
        success: function(json) {
            const data = JSON.parse(json);
            let body = '';
            data.forEach((data) => {
                let color_change = '#' + ((1 << 24) * (Math.random() + 1) | 0).toString(16).substr(1);
                body += `<tr>
                               <td>${data.sdt}</td>
                                <td>${data.tiencuoc}</td>
                             
                                <td>${data.trochoi}</td>
                                <td><span class="fa-stack"><span class="fa fa-circle fa-stack-2x"></span><span class="fa-stack-1x text-white">${data.noidung}</span></span></td>
                                <td><span class="label label-success text-uppercase">
                                    Thắng
                                </span></td>
                            </tr>
                            `;
            });
            return_timer();
            $('#0X2134X453').html(body);
        }
    })
}
check_ls();
check_ls();
setInterval(function() {
    check_ls();
}, 10000);

function return_timer() {
    var count = 8;
    var counter = setInterval(timer, 1000);

    function timer() {
        count = count - 1;
        if (count <= 0) {
            clearInterval(counter);
            return;
        }
        for (var k = 2; k <= 13; k++) {
            var tik = "timer" + k;
            document.getElementById(tik).innerHTML = "Làm mới sau <span style='color: #ff8c1a;'>" + count + "</span> giây" +
                '<img src="image/loading_ab.jpeg"width="25px">';
        };
        document.getElementById("timer").innerHTML = "Làm mới sau <span style='color: #ff8c1a;'>" + count + "</span> giây" +
            '<img src="image/loading_ab.jpeg"width="25px">';
    }
}

function check_sdt() {
    $.ajax({
        url: "kiemtra/sdt.html",
        success: function(json) {
            const data = JSON.parse(json);
            let body = '';
            data.forEach((data) => {
                body += `<tr>
                                <td>${data.sdt} <span class="label label-success text-uppercase" onclick="copyStringToClipboard('${data.sdt}')"><i class="fa fa-clipboard" aria-hidden="true"></i></span>
                                
                                </td>
                                <td><span class="label label-success text-uppercase">Hoạt động</span></td>
                                <td>${data.today}/${data.limit_day}</td>
                                <td>${data.today_gd}/${data.ghbank}</td>
                            </tr>
                            `;
            });
            return_timer();
            $('#0X2134X555').html(body);
        }
    })
}
check_sdt();
check_sdt();
setInterval(function() {
    check_sdt();
}, 100000);

function return_timer() {
    var count = 8;
    var counter = setInterval(timer, 1000);

    function timer() {
        count = count - 1;
        if (count <= 0) {
            clearInterval(counter);
            return;
        }
        for (var k = 2; k <= 13; k++) {
            var tik = "timer" + k;
            document.getElementById(tik).innerHTML = "Làm mới sau <span style='color: #ff8c1a;'>" + count + "</span> giây" +
                '<img src="image/loading_ab.jpeg"width="25px">';
        };
        document.getElementById("timer").innerHTML = "Làm mới sau <span style='color: #ff8c1a;'>" + count + "</span> giây" +
            '<img src="image/loading_ab.jpeg"width="25px">';
    }
}

function choilanhan() {
    if (!$('#PhoneChoi')['val']()) {
        swal('Oh no ! Bạn cần cung cấp SĐT để web check cho bạn chứ !');
    } else {
        $(document).ajaxStart(function() {
            $("#submit1").attr("disabled", true);
        });
        nap()
    }
}

function nap() {
    $('#submit1')['html']('<div class="spinner-border text-warning" role="status"></div>Đang xử lý');
    $['post']('/kt1', {
        PhoneChoi: $('#PhoneChoi')['val']()
    }, function(_0xb982x3) {
        swal(_0xb982x3['ketqua']);
        $('#submit1')['html']('SĐT khác')
    }, 'json')
    $(document).ajaxComplete(function() {
        $("#submit1").attr("disabled", false);
    });
}

function choilanhan2() {
    if (!$('#PhoneChoia')['val']()) {
        alert('Oh no ! Bạn cần cung cấp mã giao dịch để web check cho bạn chứ !');
    } else {
        $(document).ajaxStart(function() {
            $("#submit2").attr("disabled", true);
        });
        nap2()
    }
}

function nap2() {
    $('#submit2')['html']('<div class="spinner-border text-warning" role="status"></div>Đang xử lý');
    $['post']('/kt2', {
        PhoneChoia: $('#PhoneChoia')['val']()
    }, function(_0xb982x3) {
        alert(_0xb982x3['ketqua']);
        $('#submit2')['html']('Mã GD hoặc SĐT khác')
    }, 'json')
    $(document).ajaxComplete(function() {
        $("#submit2").attr("disabled", false);
    });
}

function choilanhan3() {
    if (!$('#PhoneChoia')['val']()) {
        alert('Oh no ! Bạn cần cung cấp mã giao dịch để web xác định trả thưởng !');
    } else if (!$('#phonenhan')['val']()) {
        alert('Oh no ! Bạn cần cung cấp số điện thoại để nhận thưởng !');
    } else {
        $(document).ajaxStart(function() {
            $("#submit3").attr("disabled", true);
        });
        nap3()
    }
}

function nap3() {
    $('#submit3')['html']('<div class="spinner-border text-warning" role="status"></div>Đang xử lý');
    $['post']('/kt3', {
        PhoneChoia: $('#PhoneChoia')['val'](),
        phonenhan: $('#phonenhan')['val']()
    }, function(_0xb982x3) {
        alert(_0xb982x3['ketqua']);
        $('#submit3')['html']('Số điện thoại khác')
    }, 'json')
    $(document).ajaxComplete(function() {
        $("#submit3").attr("disabled", false);
    });
}