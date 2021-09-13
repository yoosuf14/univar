<?php
include_once '../connection.php';
if(isset($_POST['submit']))
{		
		$productname = $_POST['productname'];
		$productdescription = $_POST['productdescription'];
		$quantity = $_POST['quantity'];
		$unitprice = $_POST['unitprice'];
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg' , 'png' ,'tif', 'jpeg', 'jfif');

		if(in_array($fileActualExt, $allowed))
		{
			if ($fileError === 0) {
					if ($fileSize < 1000000000) {
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = '../images/products/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);

						$sql = "INSERT INTO products (UnitPrice,quantityAvailable,productName,productDescription,imagesrc) VALUES ('$unitprice', '$quantity', '$productname', '$productdescription', '$fileNameNew')";
						$result = mysqli_query($conn, $sql);
						if($result)
						{
							header("Location:addProduct.php?uploaded");
							
						}
						else
						{
							echo "Upload wasn't successful! ";
						}

					}

					else{
						echo "Your file size is too big!";
					}
				}	
			else{
				echo "There was an error uploading your file.";
			}	
		}
		else
		{
			echo "uploaded File is not supported";
		}
}
?>


