<?php
/**
 * Team info on hover shortcode template
 */
?>
<div class="qodef-team <?php echo esc_attr( $team_type ) ?>">
    <div class="qodef-team-inner bor-left">
		<?php if ( $team_image !== '' ) { ?>
            <div class="qodef-team-image">
				<?php echo wp_get_attachment_image( $team_image, 'full' ); ?>
            </div>
		<?php } ?>

		<?php if ( $team_name !== '' || $team_position !== '' || $team_description != "" ) { ?>
            <div style="margin-bottom:14px;" class="qodef-team-info">
			<?php if ( $team_name !== '' || $team_position !== '' ) { ?>
            <div class="qodef-team-title-holder <?php echo esc_attr( $team_social_icon_type ) ?>">
				<?php if ( $team_name !== '' ) { ?>
                    <<?php echo esc_attr( $team_name_tag ); ?> class="qodef-team-name">
					<?php echo esc_attr( $team_name ); ?>
                    </<?php echo esc_attr( $team_name_tag ); ?>>
				<?php } ?>
				<?php if ( $team_position !== "" ) { ?>
                    <h6 class="q_team_position"><?php echo esc_attr( $team_position ) ?></h6>
				<?php } ?>
                </div>
			<?php } ?>

			<?php if ( $team_description != "" ) { ?>
                <div class='qodef-team-text'>
                    <div class='qodef-team-text-inner'>
                        <div class="qodef-separator"></div>
                        <div class='qodef-team-description'>
                            <p><?php echo esc_attr( $team_description ) ?></p>
                        </div>
                    </div>
                </div>
			<?php }
		} ?>

        <div class="qodef-team-social-holder-between">
            <div class="qodef-team-social <?php echo esc_attr( $team_social_icon_type ) ?>">
                <div class="qodef-team-social-inner">
                    <div class="qodef-team-social-wrapp">

						<?php foreach ( $team_social_icons as $team_social_icon ) {
							print wp_kses_post( $team_social_icon );
						} ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>