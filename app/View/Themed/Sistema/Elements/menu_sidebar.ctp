<?php
  $id = isset($id)?$id:false;
  $menu = $this->requestAction("/menus/load/{$id}");
  $menus = array();
  foreach ($menu['MenuSection'] as $section){
    if( count($section['MenuSectionLink'])>0 ){
      $menus['sessoes'][ $section['id'] ] = array( 'label'=> $section['name'], 'icon'=>$section['icon']);
      foreach ( $section['MenuSectionLink'] as $link){
      $params = Router::parse( $link['alias']);
        $menus['sessoes'][ $section['id'] ]['links'][] = array(
          'alias'=> $link['alias'],
          'label'=>__( $link['name'] ),
          'icon'=>__( $link['icon'] ),
          'link'=> $params,
          'title'=>__("Languages")
        );
      }
    }
  }
?>

<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
		<li>
			<?php
				echo $this->Html->link('<i class="fa fa-dashboard"></i> Home', array('controller'=>'admin', 'plugin'=>false),array('title'=>'Home', 'escape'=>false));
			?>
		</li>

		<?php foreach( $menus['sessoes'] as $k => $menu ):
			$O = Set::classicExtract( $menu['links'] , '{n}.alias' );
			$controller = $this->request->params['controller'];
			$key = array_search( $controller , $O);
			$in = '';
			if( is_numeric($key)){
				$in = 'in';
			}
			?>
			<li>
				<a href="#collapse<?php echo $k; ?>" data-toggle="collapse" data-parent="#accordion">
					<?php if($menu['icon']) echo "<span class=\"glyphicon {$this->Formatacao->icon($menu['icon'])}\" aria-hidden=\"true\"></span>";?> <?=$menu['label'];?> <i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="collapse<?php echo $k; ?>" class="collapse">
					<li>
						<?php foreach( $menu['links'] as $link){ ?>
							<?php
								echo $this->Html->link("<span class=\"glyphicon {$this->Formatacao->icon($link['icon'])}\" aria-hidden=\"true\"></span>  {$link['label']}",
									$link['link'],
									array('title'=>$link['title'], 'escape'=> false, )
								);
							?>
						<?php } ?>
					</li>
				</ul>
			</li>
		<?php endforeach; ?>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Visualizar o site', array('controller'=>'pages', 'action'=>'index', 'admin'=>false, 'plugin'=>false),array('title'=>'Visualizar o site', 'target'=>'_blank', 'escape'=>false));?></li>
	</ul>
</div>



