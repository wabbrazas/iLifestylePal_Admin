<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLifestylePal - Add Food</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/sidenav.css">
    <link rel="stylesheet" href="styles/addfood.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">

</head>
<body>
    <div class="wrapper">
        <!-- Side Navigation -->
        <?php include 'sidenav.php'; ?>

        <div id="content">
            <div class="card">
                <div class="card-body">
                    <h3>Add Food</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="foods.php">Foods</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Food</li>
                        </ol>
                    </nav>
                    <form action="" enctype="multipart/form-data">
                        <div class="foodimg-wrapper">
                            <div style="width: fit-content;">
                                <figure class="image-container">
                                    <img id="chosen-image" src="">
                                    <figcaption id="file-name"></figcaption>
                                </figure>
                                <input type="file" id="upload-button" accept="image/*">
                                <label id="choose-photo" for="upload-button"><i class="fa-solid fa-upload"></i> Choose A Photo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Food Name:</label><br>
                                <input id="food_name" type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Food Calories:</label>
                                <input id="food_calories" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button id="save_food" style="margin: 20px 0px; width: 100px;" type="button" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-analytics.js";
        import { getDatabase, ref, onValue, push, child, set } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-database.js";
        import { getStorage, ref as storageRef, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-storage.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyAW4sc008PndTi9tyGh_TS2Z5g0ShXwTsM",
            authDomain: "ilifestylepal.firebaseapp.com",
            databaseURL: "https://ilifestylepal-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "ilifestylepal",
            storageBucket: "ilifestylepal.appspot.com",
            messagingSenderId: "268679202640",
            appId: "1:268679202640:web:96a149642b545a80ad0e55",
            measurementId: "G-P7G71V8719"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);

        const db = getDatabase();
        const storage = getStorage();

        const saveButton = document.getElementById('save_food');

        let uploadButton = document.getElementById("upload-button");
        let chosenImage = document.getElementById("chosen-image");
        let fileName = document.getElementById("file-name");

        uploadButton.onchange = () => {
            let reader = new FileReader();
            reader.readAsDataURL(uploadButton.files[0]);
            reader.onload = () => {
                chosenImage.setAttribute("src",reader.result);
            }
            fileName.textContent = uploadButton.files[0].name;
        }

        // Listen for click on the upload button
        saveButton.addEventListener('click', () => {
            let foodName = document.getElementById('food_name').value;
            let foodCalories = document.getElementById('food_calories').value;

            const file = uploadButton.files[0];
            const FoodsStorageRef = storageRef(getStorage(), "Food Journal/"+foodName+".jpg");

            uploadBytes(FoodsStorageRef, file).then((snapshot) => {
                console.log('Image uploaded successfully!');
                getDownloadURL(FoodsStorageRef).then((url) => {
                    console.log('Image download URL:', url);
                    // Do something with the download URL, like add it to a database
                    if (foodName !== '' && foodName !== null && foodCalories !== '' && foodCalories !== null) {
                        saveFoodInfo(foodName, foodCalories, url);
                    }
                    else {
                        alert("Please fill up the necessary input.");
                    } 
                }).catch((error) => {
                    saveFoodInfo(foodName, foodCalories, url);
                    console.log('Error getting download URL:', error);
                });
            }).catch((error) => {
                saveFoodInfo(foodName, foodCalories, url);
                console.log('Error uploading image:', error);
            });
            
        });

        function saveFoodInfo(fn, fc, furl) {
            const FoodsRef = ref(db, "Maintenance/Food Journal/"+fn);
            
            const dataToInsert = {
                foodname: fn,
                calorie: fc,
                url: furl
            };

            set(FoodsRef, dataToInsert)
            .then(() => {
                alert("Food Added Successfully.");
            })
            .catch((error) => {
                alert("Error inserting data: ", error);
            });

            document.getElementById('food_name').value = "";
            document.getElementById('food_calories').value = "";
        }
    </script>

</body>
</html>