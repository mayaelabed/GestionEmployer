            <?php 
            //session_start();
            if (isset($_SESSION['user'])){//if user is connected
                //link to data base
                include "bd_conn.php";
                //requete pour afficher les messages
                $req = mysqli_query($con,"SELECT * FROM messages ORDER BY id_m DESC");
                if(mysqli_num_rows($req) == 0){
                    //no msg yet
                    echo "messagerie vide";
                }else{
                    //else it's my msg
                    while($row = mysqli_fetch_assoc($req)){
                        if($row['email'] == $_SESSION['user']){
                            ?>
                                <div class="message your_message">
                                    <span>vous</span>
                                    <p><?=$row['msg']?></p>
                                    <p class="date"><?=$row['date']?></p>
                                </div>
            
                            <?php
                        }else{
                            ?>
                                 <div class="message others_message">
                                 <span><?=$row['email']?></span>
                                 <p><?=$row['msg']?></p>
                                 <p class="date"><?=$row['date']?> </p>
            </div>
                            <?php
                        }
                    }
                }
            }
            ?>
            
            