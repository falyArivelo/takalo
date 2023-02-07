window.onload = () => {
    // //initialisation AJAX
    // //Les codes ci dessous sont executé lors que la page est chargée
    // // window.addEventListener("load", function () {
    //     //initialiser AJAX
    //     var xhr;
    //     try { xhr = new ActiveXObject('Msxml2.XMLHTTP'); }
    //     catch (e) {
    //         try { xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
    //         catch (e2) {
    //             try { xhr = new XMLHttpRequest(); }
    //             catch (e3) { xhr = false; }
    //         }
    //     }
    //     // Définissez ce qui se passe si la soumission s'est opérée avec succès
    //     xhr.addEventListener("load", function (event) {
    //         msg = (event.target.responseText != "") ? event.target.responseText : "OK";
    //         // alert(msg);
    //         // window.location.href = event.redirect;
    //     });

    //     // Definissez ce qui se passe en cas d'erreur
    //     xhr.addEventListener("error", function (event) {
    //         alert('Oups! Quelque chose s\'est mal passé.');
    //     });
    //     //Fin de l'inititalisation

    //     function sendData(form) {
    //         // Liez l'objet FormData et l'élément form
    //         var formData = new FormData(form);
    //         // Configurez la requête
    //         xhr.open("POST", "../inc/process.php",true);
    //         // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
    //         xhr.send(formData);
    //     }
    //     let arg = "new";
    //     // Accédez à l'élément form …
    //     var form = document.getElementById(arg);

    //     // … et prenez en charge l'événement submit.
    //     form.addEventListener("submit", function (event) {
    //         event.preventDefault(); // évite de faire le submit par défaut
    //         sendData();
    //     });
    // });
    //Fin de l'inititalisation

    const selectImage = document.querySelector('.selectimage');
    const inputFile = document.querySelector('#file');
    const imgArea = document.querySelector('.img-area');

    selectImage.addEventListener('click', function () {
        inputFile.click();
    })

    inputFile.addEventListener('change', function () {
        const image = this.files[0]
        if (image.size < 5000000) {
            const reader = new FileReader();
            reader.onload = () => {
                const allImg = imgArea.querySelectorAll('img');
                allImg.forEach(item => item.remove());
                const imgUrl = reader.result;
                const img = document.createElement('img');
                img.src = imgUrl;
                imgArea.appendChild(img);
                imgArea.classList.add('active');
                imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
        } else {
            alert("Image size more than 2MB");
        }
    });

    // document.getElementById("new").addEventListener("submit", function (e) {
    //     e.preventDefault();
    //     var data = new FormData(this); //data in the form of this
    //     xhr.open("POST", "../inc/process.php", true);
    //     xhr.send(data);

    // });


    //     $(".n").on("submit", function (e) {
    //         e.preventDefault();
    //         let data = new FormData(this); //data in the form of this
    //         $.ajax({
    //             type: "POST",
    //             url: "ajax.php",
    //             data: {
    //                 action: "like",
    //                 number: 1
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 console.log(response);
    //                 $("#response").html(`${response.message} ${response.number}`);
    //             },
    //             error: function (response) {
    //                 console.log("ERROR");
    //             },
    //             complete: function (response) {
    //                 console.log("COMPLETE");
    //             }

    //         });
    //         if (this.classList.contains('far')) {
    //             this.classList.replace('far', 'fas');
    //             $(this).addClass('loved');

    //         }
    //         else {
    //             this.classList.replace('fas', 'far');
    //             $(this).removeClass('loved');

    //         }
    //     });
};
