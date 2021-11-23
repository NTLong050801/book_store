<?php
               $idTL = $_POST['idTL'];
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td scope="row"><?php echo $row['s_id'] ?></td>
                            <td><?php echo $row['s_ten'] ?></td>
                            <!-- <td><?php echo $row['tg_ten'] ?></td> -->
                            <td><?php echo $row['nxb'] ?></td>
                            <td><img src="../img/<?php echo $row['anh'] ?>" alt="" style="width: 200px;" class="img-fluid"></td>
                            <td><?php echo $row['s_gia'] ?></td>
                            <td><?php echo $row['s_giamgia'] ?></td>
                            <td>
                                <a href="./sua.php?id=<?php echo $row['s_id'] ?>"><button class="btn"><i class="fas fa-edit"></i></button></a>
                                <a href="./xoa.php?id=<?php echo $row['s_id'] ?>"><button class="btn"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>