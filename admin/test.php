<?php
include_once("config/connect.php");
$sql = 'SELECT * FROM customer_account ORDER BY cid DESC LIMIT 5';
                                        $runsql = mysqli_query($connection, $sql);
                                        while($row = mysqli_fetch_array($runsql)){
                                            $name = $row['firstname'];
                                            $email =$row['email'];
                                            $date = $row['created_at'];
                                            $photo = $row['cphoto'];
                                            $recent = "
                                            <tr>
                                                <td class='border-top-0 px-2 py-4'>
                                                    <div class='d-flex no-block align-items-center'>
                                                        <div class='mr-3'><img
                                                                src=$photo
                                                                alt='user' class='rounded-circle' width='45'
                                                                height='45' /></div>
                                                        <div class=''>
                                                            <h5 class='text-dark mb-0 font-16 font-weight-medium'>$name</h5>
                                                            <span class='text-muted font-14'>$email</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class='border-top-0 text-muted px-2 py-4 font-14'>Elite Admin</td>
                                                <td class='border-top-0 px-2 py-4'>
                                                    <div style='text-align:left;'>
                                                        <a>$date</a>
                                                    </div>
                                                </td>
                                                <td class='border-top-0 text-center px-2 py-4'><i
                                                        class='fa fa-circle text-primary font-12' data-toggle='tooltip'
                                                        data-placement='top' title='In Testing'></i></td>
                                                <td class='font-weight-medium text-dark border-top-0 px-2 py-4'>$96K
                                                </td>
                                            </tr>
                                            ";
                                        }
?>