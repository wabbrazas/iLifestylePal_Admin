<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLifestylePal - Foods</title>

    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/sidenav.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">

    <style>
		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0,0,0,0.4);
		}
		.modal-content {
			background-color: white;
			margin: 15% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
			max-width: 600px;
		}
	</style>
</head>
<body>
    <div class="wrapper">
        <!-- Side Navigation -->
        <?php include 'sidenav.php'; ?>

        <div id="content">
            <div class="card">
                <div class="card-body">
                    <div class="header">
                        <img src="images/logo-copy.png" alt="...">
                        <h1>iLifestylePal</h1>
                    </div>
                </div>
            </div>
            <div style="margin-top: 10px;" class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="add_food.php"><button class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Food</button></a>
                        </div>
                    </div>
                    <br>
                    <div style="overflow-x: auto;">
                    <table id="tbl_foods" class="display" style="width:100%; padding-top: 5px;">
                        <thead style="background-color: #3D8361; color: white;">
                            <tr>
                                <th>#</th>
                                <th>Food Image</th>
                                <th>Food Name</th>
                                <th>Food Calories</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_foods"></tbody>
                        <tfoot style="background-color: #3D8361; color: white;">
                            <tr>
                                <th>#</th>
                                <th>Food Image</th>
                                <th>Food Name</th>
                                <th>Food Calories</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div id="myModal" class="modal">
		<div class="modal-content">
			<h2>Edit Food</h2>
            <div style="display: flex; justify-content: center; align-items: center;">
                <img id="fi" src="" alt="" style="border: 1px solid black; width: 220px; height: 220px;">
            </div>
            <input id="food_url" type="hidden" class="form-control">
			<label style="margin-top: 15px;">Food Name:</label>
            <input id="food_name" type="text" class="form-control" readonly>
            <label style="margin-top: 10px;">Food Calories:</label>
            <input id="food_calories" type="number" class="form-control">
            <div class="row">
                <div class="col-md-6">
                    <button style="margin-top: 30px; width: 100%;" class="btn btn-danger" onclick="closeModal()">Close Modal</button>
                </div>
                <div class="col-md-6">
                    <button id="saveFood" style="margin-top: 30px; width: 100%;" class="btn btn-success">Update Food</button>       
                </div>
            </div>
		</div>
	</div>

    <script>
		function openModal() {
			document.getElementById("myModal").style.display = "block";
            document.getElementById('food_name').value = "";
            document.getElementById('food_calories').value = "";
		}
		
		function closeModal() {
			document.getElementById("myModal").style.display = "none";
		}
	</script>

    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-analytics.js";
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

        import { getDatabase, ref, onValue, remove, set } 
        from "https://www.gstatic.com/firebasejs/9.16.0/firebase-database.js";

        const db = getDatabase();

        var food_no = 0;
        var tbody_foods = document.getElementById("tbody_foods");

        function GetAllFoodsData() {
            const FoodsRef = ref(db, "Maintenance/Food Journal");
            onValue(FoodsRef,(snapshot)=>{
                var foods = [];
                snapshot.forEach(childSnapshot => {
                    foods.push(childSnapshot.val());
                });
                DisplayToFoodsTable(foods);
                $('#tbl_foods').DataTable();    
            })
        }

        function DisplayToFoodsTable(foods) {
            food_no = 0;
            tbody_foods.innerHTML = "";
            foods.forEach(element => {
                DisplayItemToFoodsTable(element.foodname, element.calorie, element.url);
            });
        }

        function DisplayItemToFoodsTable(foodname, calorie, url) {
            let tr = document.createElement("tr");
            let td1 = document.createElement("td");
            let td2 = document.createElement("td");
            let td3 = document.createElement("td");
            let td4 = document.createElement("td");
            let td5 = document.createElement("td");
            let td6 = document.createElement("td");

            td1.innerHTML = ++food_no;
            td2.innerHTML = '<img style="height: 50px; width: 50px;" src="' + url + '" alt="">';            
            td3.innerHTML = foodname;
            td4.innerHTML = calorie;

            td5.innerHTML = '<button id="editFood" type="button" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button>';
            td6.innerHTML = '<button id="deleteFood" type="button" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash-can"></i></button>';

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tbody_foods.appendChild(tr); 
        }

        window.onload = GetAllFoodsData;

        $('#tbody_foods').on('click', 'button#editFood', (event) => {
            const parentRow = $(event.currentTarget).closest('tr');
            const rowIndex = $('#tbl_foods').DataTable().row(parentRow).index();
            const cellData1 = $('#tbl_foods').DataTable().cell(rowIndex, 2).data();
            const cellData2 = $('#tbl_foods').DataTable().cell(rowIndex, 3).data();
            
            document.getElementById("myModal").style.display = "block";
            document.getElementById('food_name').value = cellData1;
            document.getElementById('food_calories').value = cellData2;

            const FoodsRef = ref(db, "Maintenance/Food Journal/"+cellData1);
            onValue(FoodsRef,(snapshot)=>{
                var url = snapshot.child("url").val();
                console.log(url);
                document.getElementById('food_url').value = url;   
                document.getElementById('fi').src = url;  
            })
        });

        const updateButton = document.getElementById('saveFood');
        updateButton.addEventListener('click', () => {
            let foodName = document.getElementById('food_name').value;
            let foodCalories = document.getElementById('food_calories').value;
            let food_url = document.getElementById('food_url').value;  

            if (foodName !== '' && foodName !== null && foodCalories !== '' && foodCalories !== null) {
                const FoodsRef = ref(db, "Maintenance/Food Journal/"+foodName);
                const dataToInsert = {
                    foodname: foodName,
                    calorie: foodCalories,
                    url: food_url
                };
                set(FoodsRef, dataToInsert)
                .then(() => {
                    alert("Food Updated Successfully.");
                })
                .catch((error) => {
                    alert("Error inserting data: ", error);
                });
                document.getElementById('food_name').value = "";
                document.getElementById('food_calories').value = "";
                document.getElementById("myModal").style.display = "none";
            } else {
                alert("Please fill up the necessary input.");
            } 
        });

        $('#tbody_foods').on('click', 'button#deleteFood', (event) => {
            const parentRow = $(event.currentTarget).closest('tr');
            const rowIndex = $('#tbl_foods').DataTable().row(parentRow).index();
            const cellData = $('#tbl_foods').DataTable().cell(rowIndex, 2).data();
            
            var confirmResult = confirm("Do you want to proceed in deleting this food?");
            if (confirmResult) {
                const FoodsRef = ref(db, "Maintenance/Food Journal/"+cellData);
                remove(FoodsRef)
                .then(() => {
                    console.log("Data deleted successfully.");
                })
                .catch((error) => {
                    console.error("Error deleting node:", error);
                });
            } else {
                // user clicked "Cancel" (false)
                // Do something else here, or nothing
            }
        });
    </script>
</body>
</html>