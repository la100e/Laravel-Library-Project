<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
</head>
<body class="d-flex align-items-center justify-content-center flex-column p-5">
    <div id="div1" class="div"></div><br>
    <input class="btn btn-success w-25" type="button" value="Charger les donnees" id="b"><br>
    <div id="div2" class="div"></div>
    <div id="div3"></div>
    <script>
        function Afficher() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let d = document.getElementById(div3);
                    results = JSON.parse(xhttp.responseText);
                    document.write('<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>"><table class="table table-striped w-100"><tr><th>ISBN</th><th>Titre</th><th>Prix</th><th>Description</th></tr>');
                    results.forEach(element => {
                        document.write('<tr><td>' + element.isbn + '</td><td>' + element.titre + '</td><td>' + element.prix + '</td><td>'+ element.description +'</tr>');
                    });
                    document.write('</table>');
                }
            };
            xhttp.open("GET", "<?php echo e(route('livres.ajax')); ?>", true);
            xhttp.send();
        }
        document.getElementById("b").addEventListener("click", Afficher);
    </script>
</body>
</html>
<?php /**PATH C:\Users\ysf\Desktop\DBE\biblio\resources\views/myview.blade.php ENDPATH**/ ?>