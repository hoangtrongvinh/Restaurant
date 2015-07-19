<article class="col-2">
      <h3>Chi tiết thực đơn</h3>
      <ul>
        <?php foreach( $ds_mon_an as $food){?>
        <li>
        <img src="/images/hinh_mon_an/<?php echo $food['Food']['image'] ?> " alt="" width="210px" height="125px" align="right" style="float:right;">
        <h5 class="prev-indent-bot"><?php echo $food['Food']['name'] ?> </h5>
        <div style="height:87px; overflow:hidden;"><?php
                    echo $this->Text->truncate(
                            $food['Food']['excerpt'], 80, array(
                        'ellipsis' => '...',
                        'exact' => false
                            )
                    );
                    ?></div>
                <?php echo $this->Html->link('Chi tiết', array('controller' => 'foods',
        'action' => 'cung_loai','type' => $food['Food']['food_type_id'],
        'id' => $food['Food']['id'],'ext' => 'html'), array('class' => 'button-2'));
        ?> 
        </li>
        <?php } ?>
      </ul>
      </article>
  </div>
</div>
