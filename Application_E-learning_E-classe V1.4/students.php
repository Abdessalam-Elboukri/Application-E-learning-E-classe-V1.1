<?php 
include("check_destroy_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-class | Students</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
    <script src="bootstrap5/js/bootstrap.min.js"></script>
    <script src="bootstrap5/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section class="container-fluid">
        <div class="row flex-nowrap">

            <!-- _____________________________ -->
            <?php include 'sidebar.php'; ?>

            <!-- _______________________________ -->

            <div class="col-10" >
                <?php include 'navbar.php'; ?>

                <!-- ============================= -->
                <div class="row mt-4 flex-row p-1">
                    <div class="col-10  d-flex flex-nowrap justify-content-between w-100">
                        <h2 class=" style = font-size: 1.3rem"  >Students List </h2>
                        <div style="font-size: 1rem;">
                        <i class="bi bi-caret-up-fill text-primary"></i>
                            <a href="ajout.php" class="btn btn-primary text-uppercase d-none d-sm-inline-block ">add new student</a>
                            <a href="ajout.php" class="btn btn-primary d-sm-none "><i class="bi bi-plus-square-fill"></i></a>
                        </div>
                    </div>
                    <hr class="m-auto" style="width: 100%;">
                </div>
                <div class="row mt-2 px-1 table-responsive" style="height: 75vh; background:#EEF2FF">
                    <table class="table" style="border-collapse: separate; border-spacing: 0 9px;">
                        <thead>
                            <tr class=" text-muted ">
                                <th scope="col"></th>
                                <th scope="col" style="font-size:14px;">Name</th>
                                <th scope="col" style="font-size:14px;">Email</th>
                                <th scope="col" style="font-size:14px;">Phone</th>
                                <th scope="col" style="font-size:14px;">Enroll number</th>          
                                <th scope="col" style="font-size:14px;">Date of admission</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ---------------------------- -->
                            <?php
                            include'db.php';
                                $query = "SELECT * FROM  students ";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr class="bg-white shadow">
                                        <td class="align-middle">
                                            <?php
                                                echo "<img src='images/profiles/".$row['image']."' width=\"60\" height=\"60\" class=\"rounded-circle\">";
                                            ?>
                                        </td>
                                        <td class="align-middle "><?php echo $row['name']; ?></td>
                                        <td class="align-middle"><?php echo $row['email']; ?></td>
                                        <td class="align-middle"><?php echo $row['phone']; ?></td>
                                        <td class="align-middle"><?php echo $row['enroll_n']; ?></td>
                                        <td class="align-middle"><?php echo $row['date_a']; ?></td>
                                        <td class="text-primary align-middle \">
                                            <div class="d-flex flex-nowrap gap-3\">
                                                <a href="edit.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete"><i class="bi bi-trash3 ms-3"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No result found";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
    $('.delete').on('click',function (e) {
        e.preventDefault();
        var self = $(this);
        console.log(self.data('title'));
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Student has been deleted.',
                    'success'
                )
              location.href = self.attr('href');
            }
        })

    })
</script>
</body>

</html>