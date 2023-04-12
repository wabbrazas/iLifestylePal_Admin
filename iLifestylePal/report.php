<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLifestylePal - Reports</title>

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
			z-index: 1000;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0,0,0,0.4);
		}
		.modal-content {
			background-color: white;
			margin: 1% auto;
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
                    <h3>Image Post Reports</h3>
                    <div style="overflow-x: auto;">
                    <table id="table_imagePost" class="display" style="width:100%; padding-top: 5px;">
                        <thead style="background-color: #3D8361; color: white;">
                            <tr>
                                <th>#</th>
                                <th>Timestamp</th>
                                <th>Date & Time</th>
                                <th>Post ID</th>
                                <th>Posted By</th>
                                <th>Reported By</th>
                                <th>Report Description</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_imagePost"></tbody>
                        <tfoot style="background-color: #3D8361; color: white;">
                            <tr>
                                <th>#</th>
                                <th>Timestamp</th>
                                <th>Date & Time</th>
                                <th>Post ID</th>
                                <th>Posted By</th>
                                <th>Reported By</th>
                                <th>Report Description</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
            <br>
            <div style="margin-top: 10px;" class="card">
                <div class="card-body">
                    <h3>Video Post Reports</h3>
                    <div style="overflow-x: auto;">
                    <table id="table_videoPost" class="display" style="width:100%; padding-top: 5px;">
                        <thead style="background-color: #3D8361; color: white;">
                            <tr>
                                <th>#</th>
                                <th>Timestamp</th>
                                <th>Date & Time</th>
                                <th>Post ID</th>
                                <th>Posted By</th>
                                <th>Reported By</th>
                                <th>Report Description</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_videoPost"></tbody>
                        <tfoot style="background-color: #3D8361; color: white;">
                            <tr>
                                <th>#</th>
                                <th>Timestamp</th>
                                <th>Date & Time</th>
                                <th>Post ID</th>
                                <th>Posted By</th>
                                <th>Reported By</th>
                                <th>Report Description</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myImagePostModal" class="modal">
		<div class="modal-content">
			<h2>Image Post Details</h2>
            <div style="display: flex; justify-content: center; align-items: center; background-color: black;">
                <img id="post_image" src="" alt="" style="object-fit: contain; width: 100%; height: 300px;">
            </div>
            <label style="margin-top: 15px;">Post ID:</label>
            <textarea id="post_id" rows="3" cols="50" class="form-control" readonly></textarea>
			<label style="margin-top: 10px;">Post Description:</label>
            <textarea id="post_description" rows="3" cols="50" class="form-control" readonly></textarea>
            <label style="margin-top: 10px;">Report Description:</label>
            <textarea id="report_description" rows="3" cols="50" class="form-control" readonly></textarea>
            <label style="margin-top: 10px;">Posted By (User ID):</label>
            <input id="posted_by" type="text" class="form-control" readonly>
            <label style="margin-top: 10px;">Reported By (User ID):</label>
            <input id="reported_by" type="text" class="form-control" readonly>
            <div class="row">
                <div class="col-md-6">
                    <button style="margin-top: 30px; width: 100%;" class="btn btn-info" onclick="closeModal()">Close Modal</button>
                </div>
                <div class="col-md-6">
                    <button id="delImagePost" style="margin-top: 30px; width: 100%;" class="btn btn-danger">Delete Post</button>       
                </div>
            </div>
		</div>
	</div>

    <div id="myVideoPostModal" class="modal">
		<div class="modal-content">
			<h2>Video Post Details</h2>
            <div style="display: flex; justify-content: center; align-items: center; background-color: black;">
                <video id="post_video" width="100%" height="300px" controls>
                    <source id="mp4_source" src="https://firebasestorage.googleapis.com/v0/b/ilifestylepal.appspot.com/o/Post%20Videos%2F03-March-202312%3A35beItfGqJ0dUO6iV7bis1RyQpU1J2video%3A23070?alt=media&token=b6de6f0a-6c8e-4b04-b60f-6dbbf07701b5" type="video/mp4">
                    <source id="ogg_source" src="https://firebasestorage.googleapis.com/v0/b/ilifestylepal.appspot.com/o/Post%20Videos%2F03-March-202312%3A35beItfGqJ0dUO6iV7bis1RyQpU1J2video%3A23070?alt=media&token=b6de6f0a-6c8e-4b04-b60f-6dbbf07701b5" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <label style="margin-top: 15px;">Post ID:</label>
            <textarea id="post_id1" rows="3" cols="50" class="form-control" readonly></textarea>
			<label style="margin-top: 10px;">Post Description:</label>
            <textarea id="post_description1" rows="3" cols="50" class="form-control" readonly></textarea>
            <label style="margin-top: 10px;">Report Description:</label>
            <textarea id="report_description1" rows="3" cols="50" class="form-control" readonly></textarea>
            <label style="margin-top: 10px;">Posted By (User ID):</label>
            <input id="posted_by1" type="text" class="form-control" readonly>
            <label style="margin-top: 10px;">Reported By (User ID):</label>
            <input id="reported_by1" type="text" class="form-control" readonly>
            <div class="row">
                <div class="col-md-6">
                    <button style="margin-top: 30px; width: 100%;" class="btn btn-info" onclick="closeModal()">Close Modal</button>
                </div>
                <div class="col-md-6">
                    <button id="delVideoPost" style="margin-top: 30px; width: 100%;" class="btn btn-danger">Delete Post</button>       
                </div>
            </div>
		</div>
	</div>

    <script>
		function closeModal() {
			document.getElementById("myImagePostModal").style.display = "none";
            document.getElementById("myVideoPostModal").style.display = "none";
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

        import { getDatabase, ref, onValue, remove } 
        from "https://www.gstatic.com/firebasejs/9.16.0/firebase-database.js";

        const db = getDatabase();

        var report_image_no = 0;
        var tbody_imagePost = document.getElementById("tbody_imagePost");

        function GetAllImageReportsData() {
            const ImageReportRef = ref(db, "Post Reports/Images");
            onValue(ImageReportRef,(snapshot)=>{
                var image_report = [];
                snapshot.forEach(childSnapshot => {
                    childSnapshot.forEach((grandchildSnapshot) => {
                        image_report.push(grandchildSnapshot.val());
                    });
                });
                DisplayToImageReportTable(image_report);
                $('#table_imagePost').DataTable();    
            })

            GetAllVideoReportsData();
        }

        function DisplayToImageReportTable(image_report) {
            report_image_no = 0;
            tbody_imagePost.innerHTML = "";
            image_report.forEach(element => {
                DisplayItemToImageReportTable(element.date, element.description, element.post_ID, element.post_userID, element.report_userID, element.time, element.timestamp);
            });
        }

        function DisplayItemToImageReportTable(date, desc, pid, puid, ruid, time, timestamp) {
            let tr = document.createElement("tr");
            let td1 = document.createElement("td");
            let td2 = document.createElement("td");
            let td3 = document.createElement("td");
            let td4 = document.createElement("td");
            let td5 = document.createElement("td");
            let td6 = document.createElement("td");
            let td7 = document.createElement("td");
            let td8 = document.createElement("td");
            let td9 = document.createElement("td");

            td1.innerHTML = ++report_image_no;
            td2.innerHTML = timestamp;

            td3.innerHTML = date + " " + time;
            td3.style.overflow = "hidden";
            td3.style.textOverflow = "ellipsis";
            td3.style.whiteSpace = "nowrap";

            td4.innerHTML = pid;
            td4.style.overflow = "hidden";
            td4.style.textOverflow = "ellipsis";
            td4.style.whiteSpace = "nowrap";

            td5.innerHTML = puid;
            td6.innerHTML = ruid;
            td7.innerHTML = desc;

            td8.innerHTML = '<button id="viewImagePost" type="button" class="btn btn-info"><i class="fa-sharp fa-solid fa-eye"></i></button>';
            td9.innerHTML = '<button id="deleteImagePost" type="button" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash-can"></i></button>';

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);
            tr.appendChild(td8);
            tr.appendChild(td9);
            tbody_imagePost.appendChild(tr); 
        }

        var report_video_no = 0;
        var tbody_videoPost = document.getElementById("tbody_videoPost");

        function GetAllVideoReportsData() {
            const VideoReportRef = ref(db, "Post Reports/Videos");
            onValue(VideoReportRef,(snapshot)=>{
                var video_report = [];
                snapshot.forEach(childSnapshot => {
                    childSnapshot.forEach((grandchildSnapshot) => {
                        video_report.push(grandchildSnapshot.val());
                    });
                });
                DisplayToVideoReportTable(video_report);
                $('#table_videoPost').DataTable();    
            })
        }

        function DisplayToVideoReportTable(video_report) {
            report_video_no = 0;
            tbody_videoPost.innerHTML = "";
            video_report.forEach(element => {
                DisplayItemToVideoReportTable(element.date, element.description, element.post_ID, element.post_userID, element.report_userID, element.time, element.timestamp);
            });
        }

        function DisplayItemToVideoReportTable(date, desc, pid, puid, ruid, time, timestamp) {
            let tr = document.createElement("tr");
            let td1 = document.createElement("td");
            let td2 = document.createElement("td");
            let td3 = document.createElement("td");
            let td4 = document.createElement("td");
            let td5 = document.createElement("td");
            let td6 = document.createElement("td");
            let td7 = document.createElement("td");
            let td8 = document.createElement("td");
            let td9 = document.createElement("td");

            td1.innerHTML = ++report_image_no;
            td2.innerHTML = timestamp;

            td3.innerHTML = date + " " + time;
            td3.style.overflow = "hidden";
            td3.style.textOverflow = "ellipsis";
            td3.style.whiteSpace = "nowrap";

            td4.innerHTML = pid;
            td4.style.overflow = "hidden";
            td4.style.textOverflow = "ellipsis";
            td4.style.whiteSpace = "nowrap";

            td5.innerHTML = puid;
            td6.innerHTML = ruid;
            td7.innerHTML = desc;

            td8.innerHTML = '<button id="viewVideoPost" type="button" class="btn btn-info"><i class="fa-sharp fa-solid fa-eye"></i></button>';
            td9.innerHTML = '<button id="deleteVideoPost" type="button" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash-can"></i></button>';

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);
            tr.appendChild(td8);
            tr.appendChild(td9);
            tbody_videoPost.appendChild(tr); 
        }

        window.onload = GetAllImageReportsData;

        $('#tbody_imagePost').on('click', 'button#deleteImagePost', (event) => {
            const parentRow = $(event.currentTarget).closest('tr');
            const rowIndex = $('#table_imagePost').DataTable().row(parentRow).index();
            const cellData = $('#table_imagePost').DataTable().cell(rowIndex, 3).data();
            
            var confirmResult = confirm("Do you want to proceed in deleting this post?");
            if (confirmResult) {
                DeleteImagePost(cellData);
                DeletePostImageReport(cellData);
            } else {
                // user clicked "Cancel" (false)
                // Do something else here, or nothing
            }
        });

        $('#tbody_videoPost').on('click', 'button#deleteVideoPost', (event) => {
            const parentRow = $(event.currentTarget).closest('tr');
            const rowIndex = $('#table_videoPost').DataTable().row(parentRow).index();
            const cellData = $('#table_videoPost').DataTable().cell(rowIndex, 3).data();
            
            var confirmResult = confirm("Do you want to proceed in deleting this post?");
            if (confirmResult) {
                DeleteVideoPost(cellData);
                DeletePostVideoReport(cellData);
            } else {
                // user clicked "Cancel" (false)
                // Do something else here, or nothing
            }
        });

        function DeleteImagePost(cd) {
            // Get a database reference to the node you want to delete
            const PostImageRef = ref(getDatabase(), "Posts/Images/"+cd);
            // Call the `remove()` method on the reference to delete the node
            remove(PostImageRef)
            .then(() => {
                console.log("Data deleted successfully.");
            })
            .catch((error) => {
                console.error("Error deleting node:", error);
            });
        }

        function DeletePostImageReport(cd) {
            // Get a database reference to the node you want to delete
            const PostImageReportRef = ref(getDatabase(), "Post Reports/Images/"+cd);
            // Call the `remove()` method on the reference to delete the node
            remove(PostImageReportRef)
            .then(() => {
                console.log("Data deleted successfully.");
            })
            .catch((error) => {
                console.error("Error deleting node:", error);
            });
        }

        function DeleteVideoPost(cd) {
            // Get a database reference to the node you want to delete
            const PostVideoRef = ref(getDatabase(), "Posts/Videos/"+cd);
            // Call the `remove()` method on the reference to delete the node
            remove(PostVideoRef)
            .then(() => {
                console.log("Data deleted successfully.");
            })
            .catch((error) => {
                console.error("Error deleting node:", error);
            });
        }

        function DeletePostVideoReport(cd) {
            // Get a database reference to the node you want to delete
            const PostVideoReportRef = ref(getDatabase(), "Post Reports/Videos/"+cd);
            // Call the `remove()` method on the reference to delete the node
            remove(PostVideoReportRef)
            .then(() => {
                console.log("Data deleted successfully.");
            })
            .catch((error) => {
                console.error("Error deleting node:", error);
            });
        }

        $('#tbody_imagePost').on('click', 'button#viewImagePost', (event) => {
            const parentRow = $(event.currentTarget).closest('tr');
            const rowIndex = $('#table_imagePost').DataTable().row(parentRow).index();
            const cellData1 = $('#table_imagePost').DataTable().cell(rowIndex, 3).data();
            const cellData2 = $('#table_imagePost').DataTable().cell(rowIndex, 4).data();
            const cellData3 = $('#table_imagePost').DataTable().cell(rowIndex, 5).data();
            const cellData4 = $('#table_imagePost').DataTable().cell(rowIndex, 6).data();
            
            document.getElementById("myImagePostModal").style.display = "block";
            document.getElementById('post_id').value = cellData1;
            document.getElementById('report_description').value = cellData4;
            document.getElementById('posted_by').value = cellData2;
            document.getElementById('reported_by').value = cellData3;

            const PostImageRef = ref(db, "Posts/Images/"+cellData1);
            onValue(PostImageRef,(snapshot)=>{
                var postImage = snapshot.child("postImage").val(); 
                var postDescription = snapshot.child("postDescription").val();   
                document.getElementById('post_image').src = postImage;  
                document.getElementById('post_description').value = postDescription;
            })
        });

        $('#tbody_videoPost').on('click', 'button#viewVideoPost', (event) => {
            const parentRow = $(event.currentTarget).closest('tr');
            const rowIndex = $('#table_videoPost').DataTable().row(parentRow).index();
            const cellData1 = $('#table_videoPost').DataTable().cell(rowIndex, 3).data();
            const cellData2 = $('#table_videoPost').DataTable().cell(rowIndex, 4).data();
            const cellData3 = $('#table_videoPost').DataTable().cell(rowIndex, 5).data();
            const cellData4 = $('#table_videoPost').DataTable().cell(rowIndex, 6).data();
            
            document.getElementById("myVideoPostModal").style.display = "block";
            document.getElementById('post_id1').value = cellData1;
            document.getElementById('report_description1').value = cellData4;
            document.getElementById('posted_by1').value = cellData2;
            document.getElementById('reported_by1').value = cellData3;

            const PostVideoRef = ref(db, "Posts/Videos/"+cellData1);
            onValue(PostVideoRef,(snapshot)=>{
                var postVideo = snapshot.child("postVideo").val(); 
                var postDescription = snapshot.child("postDescription").val(); 
                const post_video = document.getElementById("post_video");
                const mp4_source = document.getElementById("mp4_source");
                const ogg_source = document.getElementById("ogg_source");
                mp4_source.src = postVideo;
                ogg_source.src = postVideo;
                post_video.load(); // Reload the video to update the source
                document.getElementById('post_description1').value = postDescription;
            })
        });

        const delImagePost = document.getElementById('delImagePost');
        delImagePost.addEventListener('click', () => {
            let post_id = document.getElementById('post_id').value;
            var confirmResult = confirm("Do you want to proceed in deleting this post?");
            if (confirmResult) {
                DeleteImagePost(post_id);
                DeletePostImageReport(post_id);
                document.getElementById("myImagePostModal").style.display = "none"
            } else {
                // user clicked "Cancel" (false)
                // Do something else here, or nothing
            }
        });

        const delVideoPost = document.getElementById('delVideoPost');
        delVideoPost.addEventListener('click', () => {
            let post_id = document.getElementById('post_id1').value;
            var confirmResult = confirm("Do you want to proceed in deleting this post?");
            if (confirmResult) {
                DeleteVideoPost(post_id);
                DeletePostVideoReport(post_id);
                document.getElementById("myVideoPostModal").style.display = "none"
            } else {
                // user clicked "Cancel" (false)
                // Do something else here, or nothing
            }
        });
    </script>
</body>
</html>