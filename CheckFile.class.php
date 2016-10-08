<?php

/**
 * Created by PhpStorm.
 * User: daihock
 * Date: 08.10.2016
 * Time: 11:40
 */
class CheckFile {
private $view;

    public function getView($file) {
        if ($file == -1) {
            $this->view = "<div class='table'>Пожалуйста введите полный адрес (c http:// или https://)</div>";
            return $this->view;
        }

        if ($file == -2) {
            $this->view = "<div class='table'>
                           <div class='row'>
                           <div class='firstCell'>Проверка наличия файла robots.txt</div>
                           <div class='error'>Ошибка</div>
                           <div class='rowGroup'>
                           <div class='row''><div class='cell'>Состояние</div><div class='lastCell'>Файл robots.txt отсутствует</div></div>
                           <div class='row'><div class='cell'>Рекомендации</div>
                           <div class='lastCell'>Программист: Создать файл robots.txt и разместить его на сайте.</div></div>
                           </div>
                           </div>
                           </div>";
            return $this->view;
        }

        $this->view = "<div class='table'>
                           <div class='row'>
                           <div class='firstCell'>Проверка наличия файла robots.txt</div>
                           <div class='ok'>OK</div>
                           <div class='rowGroup'>
                           <div class='row''><div class='cell'>Состояние</div><div class='lastCell'>Файл robots.txt присутствует</div></div>
                           <div class='row'><div class='cell'>Рекомендации</div>
                           <div class='lastCell'>Доработки не требуются</div></div>
                           </div>
                           </div>
                           </div>";
        $host = false;
        while ($str = fgets($file)) {
            if (strstr($str, "Host:")) {
                $host = true;
            }count
        }

        if ($host == true) {
            $this->view .= "<div class='table'>
                           <div class='row'>
                           <div class='firstCell'>Проверка указания директивы Host</div>
                           <div class='ok'>OK</div>
                           <div class='rowGroup'>
                           <div class='row''><div class='cell'>Состояние</div><div class='lastCell'>Директива Host указана</div></div>
                           <div class='row'><div class='cell'>Рекомендации</div>
                           <div class='lastCell'>Доработки не требуются</div></div>
                           </div>
                           </div>
                           </div>";
        } else {
            $this->view .= "<div class='table'>
                           <div class='row'>
                           <div class='firstCell'>Проверка наличия файла robots.txt</div>
                           <div class='error'>Ошибка</div>
                           <div class='rowGroup'>
                           <div class='row''><div class='cell'>Состояние</div><div class='lastCell'>В файле robots.txt не указана директива Host</div></div>
                           <div class='row'><div class='cell'>Рекомендации</div>
                           <div class='lastCell'>Программист: Для того, чтобы поисковые системы знали, какая версия сайта является основных зеркалом,
                                                необходимо прописать адрес основного зеркала в директиве Host. В данный момент это не прописано.
                                                Необходимо добавить в файл robots.txt директиву Host. Директива Host задётся в файле 1 раз,
                                                после всех правил.</div></div>
                           </div>
                           </div>
                           </div>";
        }

        return $this->view;
    }
}