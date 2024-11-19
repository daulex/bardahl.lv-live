<?php

function get_ui_text($name, $lang = "lv"){
    
    $lang = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : $lang;

    $name = str_replace(" ", "_", $name);


    // text
    $text = array(
      "lv" => array(
        "specifications" => "Pielaides",
        "frequently_purchased_with" => "Bieži pirktie kopā",
        "description" => "Apraksts",
        "reviews" => "Atsauksmes",
        "popular_product" => "Populāra prece",
        "official_distributor" => "Oficiālais Bardahl pārstāvis Latvijā",
        "address" => "Daugavgrīvas iela 112, Rīga",
        "phone" => "+371 20431406",
        "work_hours" => "P. &mdash; Pk. 9:00 &mdash; 18:00 <br>S. Brīvdiena <br>Sv. Brīvdiena",
        "logo" => "Bardahl Latvija",
        "products" => "Produkti",
        "oil" => "Eļļa",
        "oils" => "Eļļas",
        "oiladditive" => "Eļļas piedeva",
        "oil-additive" => "Eļļas piedeva",
        "oil_additive" => "Eļļas piedeva",
        "oiladditives" => "Eļļas piedevas",
        "oil_additives" => "Eļļas piedevas",
        "oil-additives" => "Eļļas piedevas",
        "fueladditive" => "Degvielas piedeva",
        "fuel_additive" => "Degvielas piedeva",
        "fuel-additive" => "Degvielas piedeva",
        "fueladditives" => "Degvielas piedevas",
        "fuel_additives" => "Degvielas piedevas",
        "fuel-additives" => "Degvielas piedevas",
        "stop-leak" => "Pret noplūdi",
        "carcare" => "Car care",
        "car_care" => "Car care",
        "car-care" => "Car care",
        "product_page" => 5,
        "toggle_menu" => "Izvēlne",
        "all" => "Visi",
        "tech_liquid" => "Tehniskais šķidrums",
        "tech-liquid" => "Tehniskais šķidrums",
        "tech_liquids" => "Tehniskie šķidrumi",
        "tech-liquids" => "Tehniskie šķidrumi",
        "car" => "mašīnām",
        "motorcycle" => "motocikliem",
        "workshops" => "servisam",
        "mechanics" => "servisam",
        "sprays" => "aerosoli",
        "spray" => "aerosols",
        "price" => "Cena",
        "package" => "Iepakojums",
        "howtoorder" => "Kā pasūtīt",
        "howtoorder_long" => "Lūdzam sūtīt pasūtījumus uz epastu:",
        "bardahl_riga" => "Sia GL Oils – oficiālais Bardahl pārstāvis Latvijā",

        "cart_empty" => "Jūsu grozs ir tukšs!",
        "order_accepted" => "Jūsu pasūtījums ir pieņemts!",
        "order_will_respond" => "Mēs sazināsimies ar Jums, tiklīdz apstrādāsim Jūsu pasūtījumu.",
        "your_cart" => "Jūsu grozs",
        "cart_sum" => "Summa:",
        "cart_delivery" => "Piegāde",
        "cart_delivery_collect" => "Saņemšu veikalā pats, Daugavgrīvas iela 112, Rīgā",
        "cart_delivery_deliver" => "Vēlos piegādi",
        "cart_delivery_deliver_info" => "Lūdzu, ievadiet savu adresi. Mēs piegādājam tikai Latvijas robežās ar Venipak palīdzību. Piegādes cena tiks aprēķināta pēc pasūtījuma apstrādes.",
        "cart_delivery_deliver_placeholder" => "Jūsu pilnā adrese ar pasta indeksu.",
        "cart_contact_info" => "Jūsu kontakti",
        "form_name" => "Vārds",
        "form_surname" => "Uzvārds",
        "form_phone" => "Telefons",
        "form_email" => "E-pasts",
        "form_promo" => "Atlaižu kods",
        "form_promo_expl" => "Drīz ar Jums sazināsies Bardahl darbinieks. Jūsu gala summa ar atlaidi tiks nosūtīta uz jūsu e-pastu.",
        "error_address" => "Lūdzu, ievadiet piegādes adresi.",
        "error_required" => "Šis lauks ir obligāts.",
        "error_email" => "Nepieciešams derīgs e-pasts.",
        "order" => "Pasūtīt",
        "to_cart" => "Grozā",
        "buy" => "Pirkt",

        "product_available" => "Ir veikalā",
        "product_not_available" => "Nav veikalā",
        "product_price" => "Cena",
        "product_quantity" => "Tilpums",

        "website_link" => "Saite uz mājas lapu",
        "google_maps_link" => "Adrese kartē",
        "phone_number" => "Telefona numurs",
        "become_a_partner" => "Kļūt par partneri",

        "news" => "Ziņas",
        "popular_products" => "Populārie produkti",
        "money_from" => "no",

        "search_placeholder" => "Produktu meklēšana",
        "advise_oil" => "Iesakiet eļļu",
        "advise_oil_page" => 4509,
        "filter_advice" => "Filtru konsultācija",


        // Pilsētas
        "riga" => "Rīga",
        "ventspils" => "Ventspils",
        "liepaja" => "Liepāja",
        "jelgava" => "Jelgava",
        "daugavpils" => "Daugavpils",
        "cesis" => "Cēsis",
        "limbazi" => "Limbaži",
        "aizkraukle" => "Aizkraukle",

        "cart_link" => 957,
        "special_offer_link" => 2983,
        "posts_page" => 3587,
        "posts_page_label" => "Visas ziņas",
        "approved_by_car_brands" => "Apstiprināts Eiropas vadošo automašīnu ražotāju vidū",
        "data_sheets" => "Datu lapas",
        "technical_data_sheet" => "Tehniskā datu lapa",
        "safety_data_sheet" => "Drošības datu lapa",
        ),
      "ru" => array(
        "specifications" => "Допуски",
        "frequently_purchased_with" => "Часто покупают вместе",
        "description" => "Описание",
        "reviews" => "Отзывы",
        "official_distributor" => "Официальный представитель Бардаль в Латвии",
        "address" => "Rīga, Daugavgrīvas iela 112",
        "phone" => "+371 20431406",
        "work_hours" => "Пон. &mdash; Пят. 9:00 &mdash; 18:00 <br>С. Выходной <br>В. Выходной",
        "logo" => "Бардаль Латвия",
        "products" => "Продукты",
        "oil" => "Масло",
        "oils" => "Масла",
        "oiladditive" => "Добавка в масло",
        "oil-additive" => "Добавка в масло",
        "oil_additive" => "Добавка в масло",
        "oiladditives" => "Добавки в масло",
        "oil_additives" => "Добавки в масло",
        "oil-additives" => "Добавки в масло",
        "fueladditive" => "Добавка в топливо",
        "fuel_additive" => "Добавка в топливо",
        "fuel-additive" => "Добавка в топливо",
        "fueladditives" => "Добавки в топливо",
        "fuel_additives" => "Добавки в топливо",
        "fuel-additives" => "Добавки в топливо",
        "stop-leak" => "Stop leak",
        "carcare" => "Car care",
        "car_care" => "Car care",
        "car-care" => "Car care",
        "product_page" => 11,
        "toggle_menu" => "Навигация",
        "all" => "Все",
        "tech_liquid" => "Тех. жидкость",
        "tech-liquid" => "Тех. жидкость",
        "tech_liquids" => "Тех. жидкости",
        "tech-liquids" => "Тех. жидкости",
        "car" => "для машин",
        "motorcycle" => "для мотоциклов",
        "workshops" => "для сервисов",
        "mechanics" => "для сервисов",
        "sprays" => "аэрозоли",
        "spray" => "Aэрозоль",
        "price" => "Цена",
        "package" => "Упаковка",
        "howtoorder" => "Как заказать",
        "howtoorder_long" => "Просим слать заказы на имейл:",
        "bardahl_riga" => "SIA GL Oils — официальный представитель Bardahl в Латвии.",

        "cart_empty" => "Ваша корзина пуста!",
        "order_accepted" => "Ваш заказ принят!",
        "order_will_respond" => "Мы свяжемся с Вами, как только обработаем Ваш заказ.",
        "your_cart" => "Ваша корзина",
        "cart_sum" => "Сумма:",
        "cart_delivery" => "Доставка",
        "cart_delivery_collect" => "Заберу самостоятельно из магазина на Daugavgrīvas iela 112, Rīga",
        "cart_delivery_deliver" => "Нужна доставка",
        "cart_delivery_deliver_info" => "Пожалуйста, введите свой адрес. Мы доставляем только по территории Латвии с помощью курьерских служб. Плата за доставку будет определена после обработки Вашего заказа.",
        "cart_delivery_deliver_placeholder" => "Ваш полный адрес с почтовым индексом.",
        "cart_contact_info" => "Ваши контакты",
        "form_name" => "Имя",
        "form_surname" => "Фамилия",
        "form_phone" => "Телефон",
        "form_email" => "Эл. почта",
        "form_promo" => "Промокод",
        "form_promo_expl" => "С Вами свяжется сотрудник Бардаль. Конечная сумма со скидкой будет отправлена Вам на электронную почту.",
        "error_address" => "Пожалуйста, введите адрес доставки.",
        "error_required" => "Это поле обязательно.",
        "error_email" => "Необходима корректная электронная почта.",
        "order" => "Заказать",
        "to_cart" => "Заказать",
        "buy" => "Купить",

        "product_available" => "В наличии",
        "product_not_available" => "Нет в магазине",
        "product_price" => "Цена",
        "product_quantity" => "Ёмкость",

        "website_link" => "Домашняя страница",
        "google_maps_link" => "Адрес на карте",

        "phone_number" => "Номер телефона",
        "become_a_partner" => "Стать партнёром",

        "news" => "Новости",
        "popular_product" => "Популярный продукт",
        "popular_products" => "Популярные продукты",
        "money_from" => "от",

        "search_placeholder" => "Поиск продуктов",
        "advise_oil" => "Посоветуйте масло",
        "advise_oil_page" => 6662,
        "filter_advice" => "Получить консультацию по фильтрам",

        "data_sheets" => "Технические данные",
        "technical_data_sheet" => "Лист технических данных",
        "safety_data_sheet" => "Паспорт безопасности химической продукции",
        

        // Города
        "riga" => "Rīga",
        "ventspils" => "Ventspils",
        "liepaja" => "Liepāja",
        "jelgava" => "Jelgava",
        "daugavpils" => "Daugavpils",
        "cesis" => "Cēsis",
        "limbazi" => "Limbaži",
        "aizkraukle" => "Aizkraukle",

        "cart_link" => 6583,
        "special_offer_link" => 2994,
        "posts_page" => 3587,
        "posts_page_label" => "Все новости",
        "approved_by_car_brands" => "Одобрено крупнейшими автопроизводителями в Европе"
        )
    );

    $set = $text[$lang];

    if(isset($set[$name])):
        $res = $set[$name];
    else:
        $res = $name;
    endif;

    return $res;
  }

  function get_lang(){

    return "";
    // $res = explode("/", $_SERVER['REQUEST_URI']);
    // $res = $res[1];
    // $res = $res === "ru" ? "ru" : "";


    
    // return $res;
  }

  function get_adm_label($name, $id){
    switch ($name) {
        case 'order_status':
            $set = array(
                0 => "new",
                1 => "closed",
                2 => "awaiting_payment",
                3 => "awaiting_collection",
                4 => "cancelled"
                );
            break;
        
        case 'delivery_type':
            $set = array(
                0 => "collection",
                1 => "delivery"
                );
            break;
    }
    return $set[$id];
  }