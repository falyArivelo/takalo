window.onload = () => {
    let menu = document.querySelector('.list-menu');
    document.querySelector('.header .info').onclick = () => {
        menu.classList.toggle('active');
    }

    // $(".categorie").each(function (e) {
    //     $(this).on('click', function () {
    //         let cat = $(this).data("categorie");
    //         $.ajax({
    //             type: "POST",
    //             url: "../inc/process.php",
    //             data: {
    //                 action: "cat",
    //                 type:cat
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 console.log(response);
    //                 // response.forEach(element => {
    //                 //     console.log(element['type']);
    //                 // });
    //                 // $("#response").html(`${response.message} ${response.number}`);
    //             },
    //             error: function (response) {
    //                 console.log("errror");
    //             }
    //         });

    //         // $(selector).attr(attributeName, value);
    //     });
    // });

    // $(".card").each(function (e) {
    //     $(this).on('click', function () {
    //         let id = $(this).data("card");
    //         let img = $(this).find("img").attr("src");
    //         // console.log(img)
    //         $("#home").css("display", "none");
    //         $("#details").addClass("active");
    //         $("#details").find(".info p").text(id);
    //         $("#details").find("img").attr("src", img);

    //         // $(selector).attr(attributeName, value);
    //     });
    // });

    // $("#details .retour").on('click', function () {
    //     console.log("dfb");
    //     $("#home").css("display", "grid");
    //     $("#details").remove("active");
    // });
}
