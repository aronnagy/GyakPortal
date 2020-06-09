<?php if(isset($_SESSION['user'])): ?>
<head>
    <meta charset="UTF-8" content="width=device-width, initial-scale=1.0">
    <title>Title of the document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.css">

    <script scr="../js/jquery.js"></script>
    <script scr="../js/popper.js"></script>
    <script scr="../js/bootstrap.min.js"></script>
    <script scr="../js/bootstrap.bundle.min.js"></script>
</head>
<div class="container-fluid">
    <?php
    /*
	Superglobal array (included array)
	$ GET: parameters of get method
	$ POST: parameters of post method
	$ COOKIE: global arrays of cookies

	PHP arrays

	numbered, associative

	numbered indexes are numbers, (form 0 - override possible)

	associative indexes are strings, index is not automatical! variable declaration rules are valid to the indexes

	array declaration

	$a = array(); $a=array("'content',3,object,array(), true;
	$a[] = 'content2';
	*/
    //print_r($_GET);

    //sheet from data
    //isset: investigates the given parameter (variable or array)
    if (isset($_POST["save"])) {

        $id = $_GET['id'];
        
        //data trans happened
        print "<pre>";
        print_r($_POST);
        print "</pre>";

        //empty inspect the values of the existed variables, if empty then true, else false
        if (
            !empty($_POST['firstName'])
            //&&
            //!empty($_POST['lastName'])
            //&&
            //!empty($_POST['email'])
        ) {
            //if (isset($_POST['password']) $$ $_POST['password']== $_POST['passwordAgain'])
            if (isset($_POST['password']) && $_POST['password'] == $_POST['passwordAgain'])
            {
            $sex = null;
			$newsLetter = 0;

			$title = $_POST['title'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$email = $_POST['email'];
			$sex = $_POST['sex'];
			$password = $_POST['password'];
			$birthDate = $_POST['birthDate'];
			$addressCity = $_POST['addressCity'];
			$imageUpload = 0;
			$newsLetter = 1;
            $comment = $_POST['comment'];

            $filename = $_FILES['imageUpload']['name'];
            $image_base64 = base64_encode(file_get_contents($_FILES['imageUpload']['tmp_name']));
            
            $imageUpload = $image_base64;

            $password = hash("sha256", $password);
            
            $sql =  "UPDATE `users` SET 
            `title` = '$title',
            `firstName` = '$firstName', 
            `lastName` = '$lastName', 
            `email` = '$email', 
            `password` = '$password', 
            `birthDate` = '$birthDate',
            `addressCity` = '$addressCity', 
            `imageUpload` = '$imageUpload', 
            `newsLetter` = '$newsLetter', 
            `comment` = '$comment' 
            WHERE `users`.`id` = $id;
            ";

			if ($conn->query($sql)) {
				print "Record has changed";
			} else {
				print $conn->error;
			}
            } else {
                print("The two passwords are not matching!");
                return false;
            }
        } else {
            print("Please fill the necessary fields!");
        }
    } else {
        //data trans not happened
        print("Please fill the form");
    }
//post form variable must have null value here:
    //...
    ?>
    <div class="card">
        <div class="card-header bg-primary text-white">Update Form</div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <select name="title" id="title" class="form-control">
                                <option value=""></option>
                                <option value="dr">Dr</option>
                                <option value="prof">Prof</option>
                                <option value="jr">Jr</option>
                                <option value="mr">Mr</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="firstName">First Name</label>
                        <div class="form-group">
                            <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="lastName">Last Name</label>
                        <div class="form-group">
                            <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sex">Sex</label>
                        <div class="form-group">
                            <div class="form-check-inline">
                                <input type="radio" name="sex" id="male" value="Male" class="form-check-input">
                                <label for="male" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" name="sex" id="female" value="Female" class="form-check-input">
                                <label for="female" class="form-check-label">Female</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password Again</label>
                            <input type="password" name="passwordAgain" id="passwordAgain" placeholder="Password Again" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthDate">Birth Date</label>
                            <input type="date" name="birthDate" id="birthDate" placeholder="Birth Date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="addressCity">Address/City</label>
                            <select name="addressCity" id="addressCity" placeholder="Address City" class="form-control"?>>
                                <?php
                                $sql = "SELECT id, city FROM slovakia_cities";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        print "<option value=" . $row["id"] . ">" . $row["city"] . "</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="js--image-preview">
                                <div class="upload-options">
                                    <label for="imageUpload">Upload Avatar Image</label>
                                    <input name="imageUpload" id="imageUpload" type="file" class="image-upload" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="newsLetter" id="newsLetter" placeholder="New Letter">
                            <label class="form-check-label" for="newsLetter">Subscribe for news letter</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea id="comment" name="comment" rows="6" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="save" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="alert altert-danger">Only authenticated users can see the content of this page!</div>
<?php endif?>