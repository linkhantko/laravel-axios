<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel-Axios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Posts</h4>
                <table class="table tabel-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h4>Create</h4>
                <span class="text-bg-succes" id="successMsg"></span>
                <form name="myForm">
                    @csrf
                    <label for="" class="my-2">Title</label>
                    <input type="text" name="title" id="" class="form-control">

                    <label for="" class="my-2">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control my-2"></textarea>
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Show
        axios.get('api/posts')
        .then(response => {
            var tableBody = document.getElementById('tbody');
            response.data.forEach(item => {
            tableBody.innerHTML += '<tr><td>'+item.id+'</td><td>'+item.title+'</td><td>'+item.description+'</td><td><button class="btn btn-primary">Edit</button><button class="btn btn-danger">Delete</button></td></tr>'
            });
        })
        .catch(error => console.log(error));

        //Create
        var myForm = document.forms['myForm'];
        var titleInput = myForm['title'];
        var descriptionInput = myForm['description'];

        myForm.onsubmit = function(e) {
            e.preventDefault();

            axios.post('/api/posts',{
                title: titleInput.value,
                description: descriptionInput.value,
            })
            .then(response =>{
                document.getElementById('successMsg').innerHTML = response.data.msg
            console.log(response)
            })
            .catch(error => console.log(error));
        }

    </script>
  </body>
</html>
