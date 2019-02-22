<?php
  $manJsonFile = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/man-list.json");
  $manArr = json_decode($manJsonFile);
  $manCountAll = count($manArr);
  $imgPrefix = "img/";
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Ikea23</title>
    <meta charset="UTF-8">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
    <style>
      body * {
        box-sizing: border-box;
      }
      body {
        position: relative;
        font-family: Verdana, Arial, serif;
        font-size: 13px;
        line-height: 1.4;
      }
      .main__row {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        max-width: 780px;
      }
      .main__col-aside {
        width: 300px;
        padding-right: 30px;
      }
      .main__col-main {
        width: 400px;
        flex-grow: 2;
      }
      table {
        border-collapse:collapse;
      }
      td {
        padding: 0 10px;
        padding-left: 0;
        min-width: 100px;
      }
      p {
        margin-bottom: 1.4em;
      }
      .main__main-table td {
        background-color: #ebebeb;
      }
      .main__main-table td:first-child {
        background-color: #fff;
      }
      .main__main-table td:nth-child(2n) {
        text-align: center;
      }
      .main__main-table td:last-child {
        text-align: right;
      }
      header {
       position: relative;
      }
      .header__select {
        position: absolute;
        top: 12px;
        left: 295px;
        height: 25px;
        width: 242px;
        border: 2px solid #cccccc;
        font-size: 12px;
        outline: none;
      }
      h1 {
        position: absolute;
        top: 60px;
        left: 0;
        font-size: 20px;
        color: #ffffff;
      }
      .header__sn {
        position: absolute;
        top: 50px;
        left: 2px;
        font-size: 15px;
        font-weight: 700;
        color: #ffffff;
      }
      .header__desc {
        position: absolute;
        top: 145px;
        left: 5px;
        font-size: 13px;
        font-weight: 700;
        color: #ffffff;
      }
      .header__desc-name {
        text-transform: uppercase;
      }
      .product__gallery-big-photo {
        width: 100%;
        height: 300px;
        background-position: 50% 50%;
        -webkit-background-size: cover;
        background-size: cover;

      }
      .product__gallery-thumbs-row {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid #cccccc;
      }
      .product__gallery-item {}
      .product__gallery-thumbs {
        width: 50px;
        height: 50px;
        margin-right: 10px;
        cursor: pointer;
        background-position: 50% 50%;
        -webkit-background-size: cover;
        background-size: cover;
      }
      .product__gallery-thumbs.is-active {
        outline: 1px solid orange;
      }
      .product__gallery-thumbs:hover {
        opacity: 0.9;
      }
      .product__btn {
        display: block;
        vertical-align: top;
        background-color: #c0c0c0;
        padding: 8px 15px;
        text-align: center;
        font-size: 13px;
        cursor: pointer;
        margin-top: 30px;
      }
      .product__btn:hover {
        opacity: 0.9;
      }
    </style>
	</head>
	<body>
		<div class="body-wrapper">
      <header>
        <img src="img/header.jpg" alt="" class="header__top-img">
        <select id="" class="header__select js-select">
        <?php for ($manCount = 0; $manCount < $manCountAll; $manCount++): ?>
          <?php $manItem = $manArr[$manCount]; ?>
          <option value="<?php echo $manCount; ?>"><?php echo $manItem->name; ?></option>
        <?php endfor; ?>
        </select>
      </header>
			<main class="main main--main">
        <div class="main__tab-list">
        <?php for ($manCount = 0; $manCount < $manCountAll; $manCount++): ?>
        <?php $manItem = $manArr[$manCount]; ?>
          <div class="js-tab main__tab main__tab--<?php echo $manCount; ?>" id="tab-<?php echo $manCount; ?>">
            <div class="main__row">
              <div class="main__col-aside">
                <h1><?php echo $manItem->name; ?></h1>
                <div class="header__sn">403660<?php echo $manCount; ?></div>
                <div class="header__desc"><span class="header__desc-name"><?php echo $manItem->name; ?></span> &nbsp; &nbsp;| <?php echo $manItem->nic; ?> &nbsp; &nbsp; |
                </div>
                <b><small>PE-номер PE317642<?php echo $manCount; ?></small></b><br><br>
                <div class="product__gallery js-mini-gallery">
                  <div class="product__gallery-big-box">
                      <div class="product__gallery-big-photo js-big-photo" style="background-image: url('<?php echo $imgPrefix.$manItem->img[0]; ?>');">
                      </div>
                  </div>
                  <div class="product__gallery-thumbs-row">
                      <?php foreach($manItem->img as $img): ?>
                          <div class="product__gallery-item">
                              <div class="product__gallery-thumbs js-thumbs" data-info_text="" data-bigimage="<?php echo $imgPrefix.$img; ?>" style="background-image: url('<?php echo $imgPrefix.$img; ?>')"></div>
                          </div>
                      <?php endforeach; ?>
                  </div>
                  <p>
                    <span class="product__btn">Рассказ о товаре...</span>
                  </p>
                </div>
              </div>
              <div class="main__col-main">
                <p style="margin-top: 10px"><b>Начало продаж <?php echo $manItem->start; ?></b></p>
                <p></p>
                <div>
                  <b>Размеры товара</b><br>
                  <table class="main__top-table" style="width: 100%">
                    <tr>
                      <td>Длинна</td>
                      <td>Британская <br> <?php $length = (float)$manItem->length; echo $length*40; ?> дюйм</td>
                      <td>Метрическая <br> <?php echo $manItem->length; ?> м.</td>
                    </tr>
                  </table>
                </div>
                <div class="main__main">
                  <p><b>Количество</b></p>
                  <table class="main__main-table">
                    <tr>
                      <td><b>Размер упаковки</b></td><td></td><td></td>
                    </tr>
                    <tr>
                      <td>Количество</td><td></td><td>1</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td><td></td><td></td>
                    </tr>
                    <tr>
                      <td>Длина</td><td><?php $length = (float)$manItem->length+0.05; echo $length*40; ?> дюйм
                      </td><td><?php echo (float)$manItem->length+0.05; ?> м.</td>
                    </tr>
                    <tr>
                      <td>Ширина</td><td>-</td><td>-</td>
                    </tr>
                    <tr>
                      <td>Высота</td><td>-</td><td>-</td>
                    </tr>
                    <tr>
                      <td>Диаметр</td><td>-</td><td>-</td>
                    </tr>
                    <tr>
                      <td>Вес нетто</td><td>-</td><td>-</td>
                    </tr>
                    <tr>
                      <td>Вес брутто</td><td>-</td><td>-</td>
                    </tr>
                    <tr>
                      <td>Объем брутто</td><td>-</td><td>-</td>
                    </tr>
                  </table>
                </div>
                <div class="main__bottom">
                  <p>
                  <b>Полезная информация</b><br>
                  -
                  </p>
                  <p>
                  <b>Общая информация</b> <br>
                  <?php echo $manItem->info; ?>
                  </p>
                  <p>
                  <b>Потребительские качества</b> <br>
                  <?php echo $manItem->qual; ?>
                  </p>
                  <p>
                  <b>Инструкции по уходу</b> <br>
                  <?php echo $manItem->ins; ?>
                  </p>
                  <p>
                  <b>Экологическая информация</b> <br>
                  <?php echo $manItem->eco; ?>
                  </p>
                  <b>Материалы</b> <br>
                  <table class="main__bottom-table">
                    <tr>
                      <td>Наполнитель:</td><td><?php echo $manItem->mat; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td><td></td>
                    </tr>
                    <tr>
                      <td><b>Основная информация</b></td><td></td>
                    </tr>
                    <tr>
                      <td>Группа товаров:</td><td><?php echo $manItem->main; ?></td>
                    </tr>
                    <tr>
                      <td>Подразделение, к <br>
                      которому относится <br>
                      данный товар:</td><td>Kitchen department from IKEA DYBENKO</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <?php endfor; ?>
        </div>

			</main>

		</div>

<script>
(function (){

  var option = {
    rootTag: "body",
    itemTag: ".js-tab",
    selectTag: ".js-select",
    activeClass: "is-active"
  };

  if (option.rootTag && option.itemTag) {
    if (document.querySelector(option.rootTag) && document.querySelector(option.itemTag) ) {
      run(option);
    } else {
      if (!document.querySelector(option.rootTag)) {
        // console.log("не найден корневой элемент " + option.rootTag);
      } else {
        if (!document.querySelector(option.itemTag)) {
          console.error("не найден список табов " + option.itemTag);
        }
      }
    }
  } else {
    console.error("табам не заданы необходимые параметры");
  }

  // запуск слайдера
  function run(option) {

    var rootList = document.querySelectorAll(option.rootTag);
    rootList = Array.from(rootList);
    var itemTag = option.itemTag;
    var selectTag = option.selectTag;


    // инициализация
    rootList.forEach(function (rootEl, rootId) {

      var currentTab = 0;
      var itemList = rootEl.querySelectorAll(itemTag);
      itemList = Array.from(itemList);
      var selectEl = rootEl.querySelector(selectTag);
      var optionList = selectEl.querySelectorAll("option");
      var activeClass = option.activeClass+"-"+rootId;
      var itemClass = itemTag.slice(1);
      var tabCss = `.${itemClass} {display: none;} `;

      if(itemList.length !== optionList.length) {
        console.error("Количество табов "+itemList.length+" не равно количеству селектов "+optionList.length);
      }

      // установка id на табы и селекты
      itemList.forEach(function (item, i) {
        item.dataset.tab = i;
        optionList[i].value = i;

        // создание стилей
        var currentTabClass = itemClass+"--"+i;
        item.classList.add(currentTabClass);
        var currentActiveClass = activeClass+"--"+i;
        tabCss = tabCss + `.${currentActiveClass} .${currentTabClass} {display: block;} `;
      });

      var style = document.createElement('style');
      style.innerHTML = tabCss;
      document.body.appendChild(style);

      // установка активного пункта селекта
      selectEl.options.selectedIndex = currentTab;

      // установка класса и атрибута на rootEl
      rootEl.dataset.activeTab = currentTab;

      // установка первого таба
      goTab();

      function goTab() {
        itemList.forEach(function (item, i) {
          if(rootEl.classList.contains(activeClass+"--"+i)){
            rootEl.classList.remove(activeClass+"--"+i);
          }
        });

        rootEl.classList.add(activeClass+"--"+currentTab);
        rootEl.dataset.activeTab = currentTab;
      }

      // переключение селекта
      selectEl.addEventListener("change", (e) => {
        var selectEl = e.target;
        currentTab = selectEl.options.selectedIndex;
        goTab();
      });

    });

  }


})();

(function() {

  var option = {
    rootTag: ".js-mini-gallery",
    bigPhotoTag: ".js-big-photo",
    itemTag: ".js-thumbs",
    data: "bigimage"
  };

  // проверка
  if (option.rootTag && option.bigPhotoTag && option.itemTag && option.data) {
      if (document.querySelector(option.rootTag) && document.querySelector(option.bigPhotoTag) && document.querySelector(option.itemTag)) {
          run(option);
      } else {
          if (!document.querySelector(option.rootTag)) {
              // console.log("не найден корневой элемент " + option.rootTag);
          } else {
              if (!document.querySelector(option.bigPhotoTag)) {
                  console.error("не найден блок для вывода картинки " + option.nameTag);
              }

              if (!document.querySelector(option.itemTag)) {
                  console.error("не найдены превью " + option.itemTag);
              }
          }
      }
  } else {
      console.error("минигалерее не заданы необходимые параметры");
  }

  // запуск
  function run(option) {
      // console.log("Минигалерея " + option.rootTag);
      var rootList = document.querySelectorAll(option.rootTag);
      rootList = Array.from(rootList);

      var init = function(rootEl) {
          var bigPhoto = rootEl.querySelector(option.bigPhotoTag);
          var itemList = rootEl.querySelectorAll(option.itemTag);
          itemList = Array.from(itemList);

          itemList.forEach(function (item, i, arr) {
              item.onclick = function(e) {
                  itemList.forEach(function (item, i, arr) {
                      item.classList.remove("is-active");
                  });
                  var imgUrl = item.getAttribute("data-" + option.data);
                  bigPhoto.style.backgroundImage =  "url("+imgUrl+")";
                  item.classList.add("is-active");
              };
          });

          itemList[0].classList.add("is-active");
      };

      rootList.forEach(function (rootEl, i, arr) {
          init(rootEl);
      });
  }

})();

</script>






	</body>
</html>