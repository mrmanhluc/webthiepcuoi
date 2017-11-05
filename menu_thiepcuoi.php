<li>
                        <a href="#"><span class="hover">THIỆP CƯỚI</span> <span style=" margin-left: 25px"> |</span> </a>
                        <ul class="sub_menu">
                        <?php
						$get_main_MaLoai = $data['MaLoai'];
						$sub_query = mysql_query ("SELECT * FROM loaithiep WHERE TrangthaiLoai = $get_main_MaLoai");
						while($sub_data = mysql_fetch_array($sub_query)){
						?>
                        <li>
                             <a href="#"><?php echo $sub_data['TenLoai']; ?></a>
                        </li>
                        <?php
						}
					?>
                       </ul>
               </li>