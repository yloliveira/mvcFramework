<?php
namespace src\Core;

/**
 * Classe Controller
 * Padroniza o comportamento e alguns métodos para todos os controllers.
 * @package core
 * @version 1.0.0
 * @author Yan Oliveira <oliveira.yan02@gmail.com>
 **/
abstract class Controller
{
  /**
   * Instancia um novo objeto Model.
   * Recebe como parâmetro o nome do model.
   * Para instanciar o model UsersModel.php deve-se fazer o seguinte:
   * Ex.: loadModel('Users');
   * @access protected
   * @param String $model
   * @return Model
   * @example loadModel('Users')
   **/
  protected function loadModel($model)
  {
    $model = "\src\\Models\\" . ucfirst($model);
    return new $model;
  }

  /**
   * Importa somente um arquivo de view, sem uso de template.
   * Recebe como parâmetro o nome do arquivo de view(que deve conter apenas letras minusculas) e um array contendo os dados que serão mostrados na view.
   * Para importar a view view_file.php deve-se fazer o seguinte:
   * Ex.: loadView('view_file', $data);
   * @access protected
   * @param String $view
   * @param Array $data
   * @example loadView('view_file', $data)
   **/
  protected function loadView($view, $data = array())
  {
    extract($data);
    require BASE_DIR . "/src/Views/" . strtolower($view) . ".php";
  }

  /**
   * Importa um arquivo de view, junto com um arquivo de template.
   * Recebe como parâmetro o nome do arquivos de view e template(que devem conter apenas letras minusculas) e um array contendo os dados que serão mostrados na view.
   * Para importar a view view_file.php dentro do template template_file.php deve-se fazer o seguinte:
   * Ex.: loadViewWithTemplate('template_file', 'view_file', $data);
   * @access protected
   * @param String $template
   * @param String $view
   * @param Array $data
   * @example loadView('template_file', 'view_file', $data)
   **/
  protected function loadTemplateWithView($template, $view, $data = array())
  {
    require BASE_DIR . "/src/Views/templates/" . strtolower($template) . ".php";
  }
}
