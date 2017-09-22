<?php if( have_rows('block') ): ?>
	
    <?php while ( have_rows('block') ) : the_row(); ?>
  
        <?php if( get_row_layout() == 'textblock' ):
	        $number_of_columns = get_sub_field('textblock_columns');
	        $column_one = get_sub_field('textblock_col_one');
	        $column_two = get_sub_field('textblock_col_two');
	        $column_three = get_sub_field('textblock_col_three');
	        $has_background = get_sub_field('textblock_has_background');
	        $textblock_background = get_sub_field('textblock_background');
	        $textblock_color = get_sub_field('textblock_color');
	        
	        
	        if ($number_of_columns == '3') {
		        $col_size = 'col33';
	        } elseif ($number_of_columns == '2') {
		    	$col_size = 'col50';
		    }else {
		        $col_size = 'col100';
	        }
	        
	        if(!empty($textblock_background) && $has_background == 1) {
		        $background = 'background:'.$textblock_background.';';
		        $has_back = 'background';
	        } else {
		        $background = '';
		        $has_back = '';
	        }
	        
	        if(!empty($textblock_color && $has_background == 1)) {
		        $color = 'color:'.$textblock_color.';';
	        } else {
		        $color = '';
	        }
	        
        ?>
        
        	<div class="textblock clearfix <?php echo $has_back; ?>" style="<?php echo $background; ?> <?php echo $color; ?>">
				<div class="wrapper">
					<?php if($number_of_columns >= 1 ) { ?>
						<div class="<?php echo $col_size; ?>"><?php echo $column_one; ?></div>
					<?php } ?>
					<?php if($number_of_columns >= 2) { ?>
						<div class="<?php echo $col_size; ?>"><?php echo $column_two; ?></div>
					<?php } ?>
					<?php if($number_of_columns == 3) { ?>
						<div class="<?php echo $col_size; ?>"><?php echo $column_three; ?></div>
					<?php } ?>
				</div>
			</div>


        <?php endif; ?>

    <?php endwhile; ?>

<?php else : endif; ?>