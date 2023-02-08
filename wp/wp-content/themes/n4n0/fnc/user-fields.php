<?php
function kg_user_fields_list($which = false){
  if($which === "profile"):
    return array(
            // array(
            //  "name" => "",
            //  "label" => "",
            //  "type" => "",
            //  "class" => "",
            //  "error" => false,
            //  "placeholder" => false
            //  ),
            array(
              "name" => "name",
              "label" => "Vārds",
              "type" => "text",
              "class" => "req",
              "error" => false,
              "placeholder" => "Maksims"
              ),
            array(
              "name" => "last_name",
              "label" => "Uzvārds",
              "type" => "text",
              "class" => "req",
              "error" => false,
              "placeholder" => "Čarkovs"
              ),
            array(
              "name" => "phone",
              "label" => "Telefons",
              "type" => "text",
              "class" => "req",
              "error" => false,
              "placeholder" => "20431406"
              ),
            array(
              "name" => "email",
              "label" => "E-pasts",
              "type" => "email",
              "class" => "req email",
              "error" => "Epasts tiks izmantots kā lietotāja vārds.",
              "placeholder" => "info@bardahl.lv"
              ),
            array(
              "name" => "password",
              "label" => "Parole",
              "type" => "password",
              "class" => "req password",
              "error" => "Lūdzu ievādiet drošu paroli divas reizes.",
              "placeholder" => false
              ),


            

            array(
              "type" => "spacer",
              "label" => "Piegādes adrese"
            ),

            array(
              "name" => "address",
              "label" => "Adrese",
              "type" => "text",
              "class" => "req",
              "error" => false,
              "placeholder" => "Mūkusalas iela 72b"
              ),

            array(
              "name" => "city",
              "label" => "Pilsēta",
              "type" => "text",
              "class" => "req",
              "error" => false,
              "placeholder" => "Rīga"
              ),

            array(
              "name" => "postcode",
              "label" => "Pasta indekss",
              "type" => "text",
              "class" => "req",
              "error" => false,
              "placeholder" => "LV-1004"
              ),
            array(
              "name" => "country",
              "label" => "Valsts",
              "type" => "text",
              "class" => "",
              "error" => false,
              "placeholder" => "Latvija"
              )
          );


  elseif($which == "company"):

    return array(
          // array(
          //  "name" => "",
          //  "label" => "",
          //  "type" => "",
          //  "class" => "",
          //  "error" => false,
          //  "placeholder" => false
          //  ),
          array(
            "name" => "company_name",
            "label" => "Nosaukums",
            "type" => "text",
            "class" => "req",
            "error" => false,
            "placeholder" => "GL Oils, SIA"
            ),
          array(
            "name" => "vat",
            "label" => "PVN maksātāja numurs",
            "type" => "text",
            "class" => "",
            "error" => false,
            "placeholder" => "LV40103877482"
            ),
          array(
            "name" => "regno",
            "label" => "Reģistrācijas numurs / P.K",
            "type" => "text",
            "class" => "req",
            "error" => false,
            "placeholder" => "40103877482"
            ),

          array(
            "type" => "spacer",
            "label" => "Juridiskā adrese"
          ),


          array(
            "name" => "company_address",
            "label" => "Adrese",
            "type" => "text",
            "class" => "req",
            "error" => false,
            "placeholder" => "Mūkusalas iela 72B"
            ),

          array(
            "name" => "company_city",
            "label" => "Pilsēta",
            "type" => "text",
            "class" => "req",
            "error" => false,
            "placeholder" => "Rīga"
            ),

          array(
            "name" => "company_postcode",
            "label" => "Pasta indekss",
            "type" => "text",
            "class" => "req",
            "error" => false,
            "placeholder" => "LV-1004"
            ),
          array(
            "name" => "company_country",
            "label" => "Valsts",
            "type" => "text",
            "class" => "",
            "error" => false,
            "placeholder" => "Latvija"
            ),

          array(
            "type" => "spacer",
            "label" => "Bankas rekvizīti"
          ),

          array(
            "name" => "bank_name",
            "label" => "Bankas nosaukums",
            "type" => "text",
            "class" => "req",
            "error" => false,
            "placeholder" => "Swedbank"
            ),
          array(
            "name" => "bank_code",
            "label" => "Bankas kods",
            "type" => "text",
            "class" => "req",
            "error" => false,
            "placeholder" => "HABALV22"
            ),
          array(
            "name" => "bank_account",
            "label" => "Bankas konta numurs",
            "type" => "text",
            "class" => "req",
            "error" => false,
            "placeholder" => "LV18HABA0551039761254"
            ),

        );
  else:
    return false;
  endif;
}