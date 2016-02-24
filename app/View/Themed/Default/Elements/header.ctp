<div id="header" class="row">
  <div class="row">
    <div class="col-md-4 logo">
      <?php if ($this->name == "Home"){ ?>
        <h1>
          <?php
            echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'Vital Saúde', 'class'=>'img-responsive')),
            array('plugin'=>false, 'controller' => '/', 'action'=>'index'), array('escape' => false));
          ?>
        </h1>
      <?php } else { ?>
        <?php
          echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'Vital Saúde', 'class'=>'img-responsive')),
          array('plugin'=>false, 'controller' => '/', 'action'=>'index'), array('escape' => false));
        ?>
      <?php } ?>
    </div>

    <div class="col-md-8 area-restrita">
      <div class="redes-sociais hidden-xs">
        <ul>
          <li>
            <?php
              echo $this->Html->link($this->Html->image('icon-facebook.png', array('alt' => 'Facebook')), array('plugin'=>false,
              'controller' => '', 'action'=>'index'), array('escape' => false));
            ?>
          </li>
          <li>
            <?php
              echo $this->Html->link($this->Html->image('icon-you-tube.png', array('alt' => 'You Tube')), array('plugin'=>false,
              'controller' => '', 'action'=>'index'), array('escape' => false));
            ?>
          </li>
          <li>
            <?php
              echo $this->Html->link($this->Html->image('icon-skype.png', array('alt' => 'Skype')), array('plugin'=>false,
              'controller' => '', 'action'=>'index'), array('escape' => false));
            ?>
          </li>
        </ul>
      </div>

      <div class="col-md-4 hidden-xs">
        <div class="btn-group">
          <button type="button" class="dropdown-toggle" data-toggle="dropdown">
            <?php echo $this->Html->image('icon-area-restrito.png', array('alt' => 'Àrea restrita a clientes')); ?>
          </button>
          <div class="dropdown-menu" role="menu">

            <form role="form">
              <div class="form-group">
                <label for="exampleInputEmail1">ID</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="id">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Login</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Login">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
              </div>

              <button type="submit" class="btn btn-default">Entrar</button>
            </form>

          </div>
        </div>
        <h2>Àrea restrita a clientes</h2>
        <p>Clique Aqui</p>
      </div>

      <div class="col-md-4 hidden-xs">
        <?php echo $this->Html->image('icon-telefone.png', array('alt' => 'Telefone (21) 3503-8300')); ?>
        <h2>Agendamento de exames</h2>
        <p>(21) 3503-8300</p>
      </div>

    </div>
  </div>

  <div class="menu-row">
    <div class="row">
      <div class="navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs" href="#">Menu</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <?php
                echo $this->Html->link('Início', array('controller'=>'/', 'action'=>'index', 'admin'=>false, 'plugin'=>false),
                array('title'=>'Início', 'escape'=>false));
              ?>
            </li>
            <li>
              <?php
                echo $this->Html->link('Empresa', array('controller'=>'pages', 'action'=>'view', 'slug'=>'empresa', 'admin'=>false, 'plugin'=>false),
                array('title'=>'Empresa', 'escape'=>false));
              ?>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Serviços <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php
                  echo $this->Html->link('Nome de Exemplo 1', array('controller'=>'pages', 'action'=>'view', 'slug'=>'servicos', 'admin'=>false, 'plugin'=>false),
                  array('title'=>'Serviços', 'escape'=>false));
                ?>
                <?php
                  echo $this->Html->link('Nome de Exemplo 1', array('controller'=>'pages', 'action'=>'view', 'slug'=>'servicos', 'admin'=>false, 'plugin'=>false),
                  array('title'=>'Serviços', 'escape'=>false));
                ?>
              </ul>
            </li>

            <li>
              <?php
                echo $this->Html->link('Clientes', array('controller'=>'pages', 'action'=>'view', 'slug'=>'clientes', 'admin'=>false, 'plugin'=>false),
                array('title'=>'Clientes', 'escape'=>false));
              ?>
            </li>
            <li>
              <?php
                echo $this->Html->link('NR’s', array('controller'=>'pages', 'action'=>'view', 'slug'=>'cursos',  'admin'=>false, 'plugin'=>false),
                array('title'=>'NR’s', 'escape'=>false));
              ?>
            </li>
            <li>
              <?php
                echo $this->Html->link('Rede Credenciada', array('controller'=>'page', 'action'=>'view', 'slug'=>'rede-credenciada',  'admin'=>false, 'plugin'=>'contact_manager'),
                array('title'=>'Rede Credenciada', 'escape'=>false));
              ?>
            </li>
            <li>
              <?php
                echo $this->Html->link('Blog', "",
                array('title'=>'Blog', 'escape'=>false));
              ?>
            </li>
            <li>
              <?php
                echo $this->Html->link('Contato', array('controller'=>'contacts', 'action'=>'index', 'admin'=>false, 'plugin'=>'contact_manager'),
                array('title'=>'Contato', 'escape'=>false));
              ?>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>


</div>