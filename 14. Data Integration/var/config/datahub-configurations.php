<?php 

return [
    "folders" => [

    ],
    "list" => [
        "my-datahub-configuration" => [
            "general" => [
                "active" => TRUE,
                "type" => "graphql",
                "name" => "my-datahub-configuration",
                "description" => "This is my first DataHub configuration",
                "sqlObjectCondition" => "",
                "modificationDate" => 1617886584,
                "path" => NULL
            ],
            "schema" => [
                "queryEntities" => [
                    "Product" => [
                        "id" => "Product",
                        "name" => "Product",
                        "columnConfig" => [
                            "columns" => [
                                [
                                    "attributes" => [
                                        "attribute" => "sku",
                                        "label" => "SKU",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => TRUE,
                                            "showCharCount" => FALSE,
                                            "name" => "sku",
                                            "title" => "SKU",
                                            "tooltip" => "",
                                            "mandatory" => TRUE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "price",
                                        "label" => "Price",
                                        "dataType" => "quantityValue",
                                        "layout" => [
                                            "fieldtype" => "quantityValue",
                                            "width" => NULL,
                                            "unitWidth" => NULL,
                                            "defaultValue" => NULL,
                                            "defaultUnit" => "1",
                                            "validUnits" => [
                                                "1"
                                            ],
                                            "decimalPrecision" => NULL,
                                            "autoConvert" => FALSE,
                                            "queryColumnType" => [
                                                "value" => "double",
                                                "unit" => "bigint(20)"
                                            ],
                                            "columnType" => [
                                                "value" => "double",
                                                "unit" => "bigint(20)"
                                            ],
                                            "phpdocType" => "\\Pimcore\\Model\\DataObject\\Data\\QuantityValue",
                                            "name" => "price",
                                            "title" => "Price",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "name",
                                        "label" => "Product Name",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => FALSE,
                                            "showCharCount" => FALSE,
                                            "name" => "name",
                                            "title" => "Product Name",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "short_description",
                                        "label" => "Short Description",
                                        "dataType" => "textarea",
                                        "layout" => [
                                            "fieldtype" => "textarea",
                                            "width" => 500,
                                            "height" => 100,
                                            "maxLength" => NULL,
                                            "showCharCount" => FALSE,
                                            "excludeFromSearchIndex" => FALSE,
                                            "queryColumnType" => "longtext",
                                            "columnType" => "longtext",
                                            "phpdocType" => "string",
                                            "name" => "short_description",
                                            "title" => "Short Description",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "description",
                                        "label" => "Description",
                                        "dataType" => "wysiwyg",
                                        "layout" => [
                                            "fieldtype" => "wysiwyg",
                                            "width" => "",
                                            "height" => "",
                                            "queryColumnType" => "longtext",
                                            "columnType" => "longtext",
                                            "phpdocType" => "string",
                                            "toolbarConfig" => "",
                                            "excludeFromSearchIndex" => FALSE,
                                            "name" => "description",
                                            "title" => "Description",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "brand",
                                        "label" => "Brand",
                                        "dataType" => "select",
                                        "layout" => [
                                            "fieldtype" => "select",
                                            "options" => [
                                                [
                                                    "key" => "Nike",
                                                    "value" => "1"
                                                ],
                                                [
                                                    "key" => "Ralph Lauren",
                                                    "value" => "2"
                                                ],
                                                [
                                                    "key" => "Hugo Boss",
                                                    "value" => "3"
                                                ],
                                                [
                                                    "key" => "Tommy Hilfiger",
                                                    "value" => "4"
                                                ],
                                                [
                                                    "key" => "Levi Strauss & Co.",
                                                    "value" => "5"
                                                ],
                                                [
                                                    "key" => "Burberry",
                                                    "value" => "6"
                                                ],
                                                [
                                                    "key" => "Gucci",
                                                    "value" => "7"
                                                ],
                                                [
                                                    "key" => "Adidas",
                                                    "value" => "8"
                                                ],
                                                [
                                                    "key" => "Lacoste",
                                                    "value" => "9"
                                                ],
                                                [
                                                    "key" => "Versace",
                                                    "value" => "10"
                                                ],
                                                [
                                                    "key" => "The North Face",
                                                    "value" => "11"
                                                ],
                                                [
                                                    "key" => "Louis Vuitton",
                                                    "value" => "12"
                                                ],
                                                [
                                                    "key" => "Rolex",
                                                    "value" => "13"
                                                ],
                                                [
                                                    "key" => "Calvin Klein",
                                                    "value" => "14"
                                                ],
                                                [
                                                    "key" => "Diesel",
                                                    "value" => "15"
                                                ],
                                                [
                                                    "key" => "Prada",
                                                    "value" => "16"
                                                ],
                                                [
                                                    "key" => "Armani Exchange",
                                                    "value" => "17"
                                                ],
                                                [
                                                    "key" => "Tom Ford",
                                                    "value" => "18"
                                                ],
                                                [
                                                    "key" => "Zara",
                                                    "value" => "19"
                                                ],
                                                [
                                                    "key" => "Givenchy",
                                                    "value" => "20"
                                                ],
                                                [
                                                    "key" => "Armani",
                                                    "value" => "21"
                                                ],
                                                [
                                                    "key" => "Emporio Armani",
                                                    "value" => "22"
                                                ],
                                                [
                                                    "key" => "The Timberland Company",
                                                    "value" => "23"
                                                ],
                                                [
                                                    "key" => "Champion",
                                                    "value" => "24"
                                                ],
                                                [
                                                    "key" => "Under Armour",
                                                    "value" => "25"
                                                ],
                                                [
                                                    "key" => "Vans",
                                                    "value" => "26"
                                                ],
                                                [
                                                    "key" => "H&M",
                                                    "value" => "27"
                                                ],
                                                [
                                                    "key" => "Guess",
                                                    "value" => "28"
                                                ],
                                                [
                                                    "key" => "Hollister Co.",
                                                    "value" => "29"
                                                ],
                                                [
                                                    "key" => "Hermès",
                                                    "value" => "30"
                                                ],
                                                [
                                                    "key" => "Abercrombie & Fitch",
                                                    "value" => "31"
                                                ],
                                                [
                                                    "key" => "J. Crew",
                                                    "value" => "32"
                                                ],
                                                [
                                                    "key" => "Dolce & Gabbana",
                                                    "value" => "33"
                                                ],
                                                [
                                                    "key" => "Christian Dior",
                                                    "value" => "34"
                                                ],
                                                [
                                                    "key" => "Supreme",
                                                    "value" => "35"
                                                ],
                                                [
                                                    "key" => "American Eagle Outfitters",
                                                    "value" => "36"
                                                ],
                                                [
                                                    "key" => "Michael Kors",
                                                    "value" => "37"
                                                ],
                                                [
                                                    "key" => "Banana Republic",
                                                    "value" => "38"
                                                ],
                                                [
                                                    "key" => "Balenciaga",
                                                    "value" => "39"
                                                ],
                                                [
                                                    "key" => "Fendi",
                                                    "value" => "40"
                                                ],
                                                [
                                                    "key" => "Fred Perry",
                                                    "value" => "41"
                                                ],
                                                [
                                                    "key" => "Stone Island",
                                                    "value" => "42"
                                                ],
                                                [
                                                    "key" => "Converse",
                                                    "value" => "43"
                                                ],
                                                [
                                                    "key" => "Nautica",
                                                    "value" => "44"
                                                ],
                                                [
                                                    "key" => "Off-White",
                                                    "value" => "45"
                                                ],
                                                [
                                                    "key" => "Uniqlo",
                                                    "value" => "46"
                                                ],
                                                [
                                                    "key" => "Patagonia",
                                                    "value" => " Inc."
                                                ],
                                                [
                                                    "key" => "A Bathing Ape",
                                                    "value" => "48"
                                                ],
                                                [
                                                    "key" => "Gap Inc.",
                                                    "value" => "49"
                                                ],
                                                [
                                                    "key" => "Cartier",
                                                    "value" => "50"
                                                ],
                                                [
                                                    "key" => "Fila",
                                                    "value" => "51"
                                                ],
                                                [
                                                    "key" => "Puma",
                                                    "value" => "52"
                                                ],
                                                [
                                                    "key" => "Wrangler",
                                                    "value" => "53"
                                                ],
                                                [
                                                    "key" => "Oakley",
                                                    "value" => " Inc."
                                                ],
                                                [
                                                    "key" => "Vineyard Vines",
                                                    "value" => "55"
                                                ],
                                                [
                                                    "key" => "Lee",
                                                    "value" => "56"
                                                ],
                                                [
                                                    "key" => "New Balance",
                                                    "value" => "57"
                                                ],
                                                [
                                                    "key" => "Marc Jacobs",
                                                    "value" => "58"
                                                ],
                                                [
                                                    "key" => "Salvatore Ferragamo",
                                                    "value" => "59"
                                                ],
                                                [
                                                    "key" => "DKNY",
                                                    "value" => "60"
                                                ],
                                                [
                                                    "key" => "Bulgari",
                                                    "value" => "61"
                                                ],
                                                [
                                                    "key" => "Reebok",
                                                    "value" => "62"
                                                ],
                                                [
                                                    "key" => "Topman",
                                                    "value" => "63"
                                                ],
                                                [
                                                    "key" => "Kenneth Cole",
                                                    "value" => "64"
                                                ],
                                                [
                                                    "key" => "Yves Saint Laurent",
                                                    "value" => "65"
                                                ],
                                                [
                                                    "key" => "Pull & Bear",
                                                    "value" => "66"
                                                ],
                                                [
                                                    "key" => "Palace",
                                                    "value" => "67"
                                                ],
                                                [
                                                    "key" => "Columbia",
                                                    "value" => "68"
                                                ],
                                                [
                                                    "key" => "Carrhart",
                                                    "value" => "69"
                                                ],
                                                [
                                                    "key" => "Kappa",
                                                    "value" => "70"
                                                ],
                                                [
                                                    "key" => "Aéropostale",
                                                    "value" => "71"
                                                ],
                                                [
                                                    "key" => "Quicksilver",
                                                    "value" => "72"
                                                ],
                                                [
                                                    "key" => "Moncler",
                                                    "value" => "73"
                                                ],
                                                [
                                                    "key" => "French Connection",
                                                    "value" => "74"
                                                ],
                                                [
                                                    "key" => "Ted Baker",
                                                    "value" => "75"
                                                ],
                                                [
                                                    "key" => "Express",
                                                    "value" => " Inc."
                                                ],
                                                [
                                                    "key" => "Tiffany & Co.",
                                                    "value" => "77"
                                                ],
                                                [
                                                    "key" => "Massimo Dutti",
                                                    "value" => "78"
                                                ],
                                                [
                                                    "key" => "Gant",
                                                    "value" => "79"
                                                ],
                                                [
                                                    "key" => "Ellesse",
                                                    "value" => "80"
                                                ],
                                                [
                                                    "key" => "Paul Smith",
                                                    "value" => "81"
                                                ],
                                                [
                                                    "key" => "Billabong",
                                                    "value" => "82"
                                                ],
                                                [
                                                    "key" => "Kenzo",
                                                    "value" => "83"
                                                ],
                                                [
                                                    "key" => "Helly Hansen",
                                                    "value" => "84"
                                                ],
                                                [
                                                    "key" => "Clarks",
                                                    "value" => "85"
                                                ],
                                                [
                                                    "key" => "Diamond Supply Co.",
                                                    "value" => "86"
                                                ],
                                                [
                                                    "key" => "Valentino",
                                                    "value" => "87"
                                                ],
                                                [
                                                    "key" => "G-Star Raw",
                                                    "value" => "88"
                                                ],
                                                [
                                                    "key" => "Ermenegildo Zegna",
                                                    "value" => "89"
                                                ],
                                                [
                                                    "key" => "Scotch & Soda",
                                                    "value" => "90"
                                                ],
                                                [
                                                    "key" => "Forever 21",
                                                    "value" => "91"
                                                ],
                                                [
                                                    "key" => "Hackett London",
                                                    "value" => "92"
                                                ],
                                                [
                                                    "key" => "Louis Phillipe",
                                                    "value" => "93"
                                                ],
                                                [
                                                    "key" => "Marc O'Polo",
                                                    "value" => "94"
                                                ],
                                                [
                                                    "key" => "Everlast",
                                                    "value" => "95"
                                                ],
                                                [
                                                    "key" => "Bombay Shades",
                                                    "value" => "96"
                                                ],
                                                [
                                                    "key" => "Schott NYC",
                                                    "value" => "97"
                                                ],
                                                [
                                                    "key" => "Sail Racing",
                                                    "value" => "98"
                                                ],
                                                [
                                                    "key" => "C&A",
                                                    "value" => "99"
                                                ],
                                                [
                                                    "key" => "Umbro",
                                                    "value" => "100"
                                                ]
                                            ],
                                            "width" => "",
                                            "defaultValue" => "",
                                            "optionsProviderClass" => "",
                                            "optionsProviderData" => "",
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "dynamicOptions" => FALSE,
                                            "name" => "brand",
                                            "title" => "Brand",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "made_in",
                                        "label" => "Made In",
                                        "dataType" => "country",
                                        "layout" => [
                                            "fieldtype" => "country",
                                            "restrictTo" => "",
                                            "options" => [
                                                [
                                                    "key" => "Afghanistan",
                                                    "value" => "AF"
                                                ],
                                                [
                                                    "key" => "Albania",
                                                    "value" => "AL"
                                                ],
                                                [
                                                    "key" => "Algeria",
                                                    "value" => "DZ"
                                                ],
                                                [
                                                    "key" => "American Samoa",
                                                    "value" => "AS"
                                                ],
                                                [
                                                    "key" => "Andorra",
                                                    "value" => "AD"
                                                ],
                                                [
                                                    "key" => "Angola",
                                                    "value" => "AO"
                                                ],
                                                [
                                                    "key" => "Anguilla",
                                                    "value" => "AI"
                                                ],
                                                [
                                                    "key" => "Antarctica",
                                                    "value" => "AQ"
                                                ],
                                                [
                                                    "key" => "Antigua & Barbuda",
                                                    "value" => "AG"
                                                ],
                                                [
                                                    "key" => "Argentina",
                                                    "value" => "AR"
                                                ],
                                                [
                                                    "key" => "Armenia",
                                                    "value" => "AM"
                                                ],
                                                [
                                                    "key" => "Aruba",
                                                    "value" => "AW"
                                                ],
                                                [
                                                    "key" => "Ascension Island",
                                                    "value" => "AC"
                                                ],
                                                [
                                                    "key" => "Australia",
                                                    "value" => "AU"
                                                ],
                                                [
                                                    "key" => "Austria",
                                                    "value" => "AT"
                                                ],
                                                [
                                                    "key" => "Azerbaijan",
                                                    "value" => "AZ"
                                                ],
                                                [
                                                    "key" => "Bahamas",
                                                    "value" => "BS"
                                                ],
                                                [
                                                    "key" => "Bahrain",
                                                    "value" => "BH"
                                                ],
                                                [
                                                    "key" => "Bangladesh",
                                                    "value" => "BD"
                                                ],
                                                [
                                                    "key" => "Barbados",
                                                    "value" => "BB"
                                                ],
                                                [
                                                    "key" => "Belarus",
                                                    "value" => "BY"
                                                ],
                                                [
                                                    "key" => "Belgium",
                                                    "value" => "BE"
                                                ],
                                                [
                                                    "key" => "Belize",
                                                    "value" => "BZ"
                                                ],
                                                [
                                                    "key" => "Benin",
                                                    "value" => "BJ"
                                                ],
                                                [
                                                    "key" => "Bermuda",
                                                    "value" => "BM"
                                                ],
                                                [
                                                    "key" => "Bhutan",
                                                    "value" => "BT"
                                                ],
                                                [
                                                    "key" => "Bolivia",
                                                    "value" => "BO"
                                                ],
                                                [
                                                    "key" => "Bosnia & Herzegovina",
                                                    "value" => "BA"
                                                ],
                                                [
                                                    "key" => "Botswana",
                                                    "value" => "BW"
                                                ],
                                                [
                                                    "key" => "Brazil",
                                                    "value" => "BR"
                                                ],
                                                [
                                                    "key" => "British Indian Ocean Territory",
                                                    "value" => "IO"
                                                ],
                                                [
                                                    "key" => "British Virgin Islands",
                                                    "value" => "VG"
                                                ],
                                                [
                                                    "key" => "Brunei",
                                                    "value" => "BN"
                                                ],
                                                [
                                                    "key" => "Bulgaria",
                                                    "value" => "BG"
                                                ],
                                                [
                                                    "key" => "Burkina Faso",
                                                    "value" => "BF"
                                                ],
                                                [
                                                    "key" => "Burundi",
                                                    "value" => "BI"
                                                ],
                                                [
                                                    "key" => "Cambodia",
                                                    "value" => "KH"
                                                ],
                                                [
                                                    "key" => "Cameroon",
                                                    "value" => "CM"
                                                ],
                                                [
                                                    "key" => "Canada",
                                                    "value" => "CA"
                                                ],
                                                [
                                                    "key" => "Canary Islands",
                                                    "value" => "IC"
                                                ],
                                                [
                                                    "key" => "Cape Verde",
                                                    "value" => "CV"
                                                ],
                                                [
                                                    "key" => "Caribbean Netherlands",
                                                    "value" => "BQ"
                                                ],
                                                [
                                                    "key" => "Cayman Islands",
                                                    "value" => "KY"
                                                ],
                                                [
                                                    "key" => "Central African Republic",
                                                    "value" => "CF"
                                                ],
                                                [
                                                    "key" => "Ceuta & Melilla",
                                                    "value" => "EA"
                                                ],
                                                [
                                                    "key" => "Chad",
                                                    "value" => "TD"
                                                ],
                                                [
                                                    "key" => "Chile",
                                                    "value" => "CL"
                                                ],
                                                [
                                                    "key" => "China",
                                                    "value" => "CN"
                                                ],
                                                [
                                                    "key" => "Christmas Island",
                                                    "value" => "CX"
                                                ],
                                                [
                                                    "key" => "Cocos (Keeling) Islands",
                                                    "value" => "CC"
                                                ],
                                                [
                                                    "key" => "Colombia",
                                                    "value" => "CO"
                                                ],
                                                [
                                                    "key" => "Comoros",
                                                    "value" => "KM"
                                                ],
                                                [
                                                    "key" => "Congo - Brazzaville",
                                                    "value" => "CG"
                                                ],
                                                [
                                                    "key" => "Congo - Kinshasa",
                                                    "value" => "CD"
                                                ],
                                                [
                                                    "key" => "Cook Islands",
                                                    "value" => "CK"
                                                ],
                                                [
                                                    "key" => "Costa Rica",
                                                    "value" => "CR"
                                                ],
                                                [
                                                    "key" => "Croatia",
                                                    "value" => "HR"
                                                ],
                                                [
                                                    "key" => "Cuba",
                                                    "value" => "CU"
                                                ],
                                                [
                                                    "key" => "Curaçao",
                                                    "value" => "CW"
                                                ],
                                                [
                                                    "key" => "Cyprus",
                                                    "value" => "CY"
                                                ],
                                                [
                                                    "key" => "Czechia",
                                                    "value" => "CZ"
                                                ],
                                                [
                                                    "key" => "Côte d’Ivoire",
                                                    "value" => "CI"
                                                ],
                                                [
                                                    "key" => "Denmark",
                                                    "value" => "DK"
                                                ],
                                                [
                                                    "key" => "Diego Garcia",
                                                    "value" => "DG"
                                                ],
                                                [
                                                    "key" => "Djibouti",
                                                    "value" => "DJ"
                                                ],
                                                [
                                                    "key" => "Dominica",
                                                    "value" => "DM"
                                                ],
                                                [
                                                    "key" => "Dominican Republic",
                                                    "value" => "DO"
                                                ],
                                                [
                                                    "key" => "Ecuador",
                                                    "value" => "EC"
                                                ],
                                                [
                                                    "key" => "Egypt",
                                                    "value" => "EG"
                                                ],
                                                [
                                                    "key" => "El Salvador",
                                                    "value" => "SV"
                                                ],
                                                [
                                                    "key" => "Equatorial Guinea",
                                                    "value" => "GQ"
                                                ],
                                                [
                                                    "key" => "Eritrea",
                                                    "value" => "ER"
                                                ],
                                                [
                                                    "key" => "Estonia",
                                                    "value" => "EE"
                                                ],
                                                [
                                                    "key" => "Eswatini",
                                                    "value" => "SZ"
                                                ],
                                                [
                                                    "key" => "Ethiopia",
                                                    "value" => "ET"
                                                ],
                                                [
                                                    "key" => "Falkland Islands",
                                                    "value" => "FK"
                                                ],
                                                [
                                                    "key" => "Faroe Islands",
                                                    "value" => "FO"
                                                ],
                                                [
                                                    "key" => "Fiji",
                                                    "value" => "FJ"
                                                ],
                                                [
                                                    "key" => "Finland",
                                                    "value" => "FI"
                                                ],
                                                [
                                                    "key" => "France",
                                                    "value" => "FR"
                                                ],
                                                [
                                                    "key" => "French Guiana",
                                                    "value" => "GF"
                                                ],
                                                [
                                                    "key" => "French Polynesia",
                                                    "value" => "PF"
                                                ],
                                                [
                                                    "key" => "French Southern Territories",
                                                    "value" => "TF"
                                                ],
                                                [
                                                    "key" => "Gabon",
                                                    "value" => "GA"
                                                ],
                                                [
                                                    "key" => "Gambia",
                                                    "value" => "GM"
                                                ],
                                                [
                                                    "key" => "Georgia",
                                                    "value" => "GE"
                                                ],
                                                [
                                                    "key" => "Germany",
                                                    "value" => "DE"
                                                ],
                                                [
                                                    "key" => "Ghana",
                                                    "value" => "GH"
                                                ],
                                                [
                                                    "key" => "Gibraltar",
                                                    "value" => "GI"
                                                ],
                                                [
                                                    "key" => "Greece",
                                                    "value" => "GR"
                                                ],
                                                [
                                                    "key" => "Greenland",
                                                    "value" => "GL"
                                                ],
                                                [
                                                    "key" => "Grenada",
                                                    "value" => "GD"
                                                ],
                                                [
                                                    "key" => "Guadeloupe",
                                                    "value" => "GP"
                                                ],
                                                [
                                                    "key" => "Guam",
                                                    "value" => "GU"
                                                ],
                                                [
                                                    "key" => "Guatemala",
                                                    "value" => "GT"
                                                ],
                                                [
                                                    "key" => "Guernsey",
                                                    "value" => "GG"
                                                ],
                                                [
                                                    "key" => "Guinea",
                                                    "value" => "GN"
                                                ],
                                                [
                                                    "key" => "Guinea-Bissau",
                                                    "value" => "GW"
                                                ],
                                                [
                                                    "key" => "Guyana",
                                                    "value" => "GY"
                                                ],
                                                [
                                                    "key" => "Haiti",
                                                    "value" => "HT"
                                                ],
                                                [
                                                    "key" => "Honduras",
                                                    "value" => "HN"
                                                ],
                                                [
                                                    "key" => "Hong Kong SAR China",
                                                    "value" => "HK"
                                                ],
                                                [
                                                    "key" => "Hungary",
                                                    "value" => "HU"
                                                ],
                                                [
                                                    "key" => "Iceland",
                                                    "value" => "IS"
                                                ],
                                                [
                                                    "key" => "India",
                                                    "value" => "IN"
                                                ],
                                                [
                                                    "key" => "Indonesia",
                                                    "value" => "ID"
                                                ],
                                                [
                                                    "key" => "Iran",
                                                    "value" => "IR"
                                                ],
                                                [
                                                    "key" => "Iraq",
                                                    "value" => "IQ"
                                                ],
                                                [
                                                    "key" => "Ireland",
                                                    "value" => "IE"
                                                ],
                                                [
                                                    "key" => "Isle of Man",
                                                    "value" => "IM"
                                                ],
                                                [
                                                    "key" => "Israel",
                                                    "value" => "IL"
                                                ],
                                                [
                                                    "key" => "Italy",
                                                    "value" => "IT"
                                                ],
                                                [
                                                    "key" => "Jamaica",
                                                    "value" => "JM"
                                                ],
                                                [
                                                    "key" => "Japan",
                                                    "value" => "JP"
                                                ],
                                                [
                                                    "key" => "Jersey",
                                                    "value" => "JE"
                                                ],
                                                [
                                                    "key" => "Jordan",
                                                    "value" => "JO"
                                                ],
                                                [
                                                    "key" => "Kazakhstan",
                                                    "value" => "KZ"
                                                ],
                                                [
                                                    "key" => "Kenya",
                                                    "value" => "KE"
                                                ],
                                                [
                                                    "key" => "Kiribati",
                                                    "value" => "KI"
                                                ],
                                                [
                                                    "key" => "Kosovo",
                                                    "value" => "XK"
                                                ],
                                                [
                                                    "key" => "Kuwait",
                                                    "value" => "KW"
                                                ],
                                                [
                                                    "key" => "Kyrgyzstan",
                                                    "value" => "KG"
                                                ],
                                                [
                                                    "key" => "Laos",
                                                    "value" => "LA"
                                                ],
                                                [
                                                    "key" => "Latvia",
                                                    "value" => "LV"
                                                ],
                                                [
                                                    "key" => "Lebanon",
                                                    "value" => "LB"
                                                ],
                                                [
                                                    "key" => "Lesotho",
                                                    "value" => "LS"
                                                ],
                                                [
                                                    "key" => "Liberia",
                                                    "value" => "LR"
                                                ],
                                                [
                                                    "key" => "Libya",
                                                    "value" => "LY"
                                                ],
                                                [
                                                    "key" => "Liechtenstein",
                                                    "value" => "LI"
                                                ],
                                                [
                                                    "key" => "Lithuania",
                                                    "value" => "LT"
                                                ],
                                                [
                                                    "key" => "Luxembourg",
                                                    "value" => "LU"
                                                ],
                                                [
                                                    "key" => "Macao SAR China",
                                                    "value" => "MO"
                                                ],
                                                [
                                                    "key" => "Madagascar",
                                                    "value" => "MG"
                                                ],
                                                [
                                                    "key" => "Malawi",
                                                    "value" => "MW"
                                                ],
                                                [
                                                    "key" => "Malaysia",
                                                    "value" => "MY"
                                                ],
                                                [
                                                    "key" => "Maldives",
                                                    "value" => "MV"
                                                ],
                                                [
                                                    "key" => "Mali",
                                                    "value" => "ML"
                                                ],
                                                [
                                                    "key" => "Malta",
                                                    "value" => "MT"
                                                ],
                                                [
                                                    "key" => "Marshall Islands",
                                                    "value" => "MH"
                                                ],
                                                [
                                                    "key" => "Martinique",
                                                    "value" => "MQ"
                                                ],
                                                [
                                                    "key" => "Mauritania",
                                                    "value" => "MR"
                                                ],
                                                [
                                                    "key" => "Mauritius",
                                                    "value" => "MU"
                                                ],
                                                [
                                                    "key" => "Mayotte",
                                                    "value" => "YT"
                                                ],
                                                [
                                                    "key" => "Mexico",
                                                    "value" => "MX"
                                                ],
                                                [
                                                    "key" => "Micronesia",
                                                    "value" => "FM"
                                                ],
                                                [
                                                    "key" => "Moldova",
                                                    "value" => "MD"
                                                ],
                                                [
                                                    "key" => "Monaco",
                                                    "value" => "MC"
                                                ],
                                                [
                                                    "key" => "Mongolia",
                                                    "value" => "MN"
                                                ],
                                                [
                                                    "key" => "Montenegro",
                                                    "value" => "ME"
                                                ],
                                                [
                                                    "key" => "Montserrat",
                                                    "value" => "MS"
                                                ],
                                                [
                                                    "key" => "Morocco",
                                                    "value" => "MA"
                                                ],
                                                [
                                                    "key" => "Mozambique",
                                                    "value" => "MZ"
                                                ],
                                                [
                                                    "key" => "Myanmar (Burma)",
                                                    "value" => "MM"
                                                ],
                                                [
                                                    "key" => "Namibia",
                                                    "value" => "NA"
                                                ],
                                                [
                                                    "key" => "Nauru",
                                                    "value" => "NR"
                                                ],
                                                [
                                                    "key" => "Nepal",
                                                    "value" => "NP"
                                                ],
                                                [
                                                    "key" => "Netherlands",
                                                    "value" => "NL"
                                                ],
                                                [
                                                    "key" => "New Caledonia",
                                                    "value" => "NC"
                                                ],
                                                [
                                                    "key" => "New Zealand",
                                                    "value" => "NZ"
                                                ],
                                                [
                                                    "key" => "Nicaragua",
                                                    "value" => "NI"
                                                ],
                                                [
                                                    "key" => "Niger",
                                                    "value" => "NE"
                                                ],
                                                [
                                                    "key" => "Nigeria",
                                                    "value" => "NG"
                                                ],
                                                [
                                                    "key" => "Niue",
                                                    "value" => "NU"
                                                ],
                                                [
                                                    "key" => "Norfolk Island",
                                                    "value" => "NF"
                                                ],
                                                [
                                                    "key" => "North Korea",
                                                    "value" => "KP"
                                                ],
                                                [
                                                    "key" => "North Macedonia",
                                                    "value" => "MK"
                                                ],
                                                [
                                                    "key" => "Northern Mariana Islands",
                                                    "value" => "MP"
                                                ],
                                                [
                                                    "key" => "Norway",
                                                    "value" => "NO"
                                                ],
                                                [
                                                    "key" => "Oman",
                                                    "value" => "OM"
                                                ],
                                                [
                                                    "key" => "Pakistan",
                                                    "value" => "PK"
                                                ],
                                                [
                                                    "key" => "Palau",
                                                    "value" => "PW"
                                                ],
                                                [
                                                    "key" => "Palestinian Territories",
                                                    "value" => "PS"
                                                ],
                                                [
                                                    "key" => "Panama",
                                                    "value" => "PA"
                                                ],
                                                [
                                                    "key" => "Papua New Guinea",
                                                    "value" => "PG"
                                                ],
                                                [
                                                    "key" => "Paraguay",
                                                    "value" => "PY"
                                                ],
                                                [
                                                    "key" => "Peru",
                                                    "value" => "PE"
                                                ],
                                                [
                                                    "key" => "Philippines",
                                                    "value" => "PH"
                                                ],
                                                [
                                                    "key" => "Pitcairn Islands",
                                                    "value" => "PN"
                                                ],
                                                [
                                                    "key" => "Poland",
                                                    "value" => "PL"
                                                ],
                                                [
                                                    "key" => "Portugal",
                                                    "value" => "PT"
                                                ],
                                                [
                                                    "key" => "Pseudo-Accents",
                                                    "value" => "XA"
                                                ],
                                                [
                                                    "key" => "Pseudo-Bidi",
                                                    "value" => "XB"
                                                ],
                                                [
                                                    "key" => "Puerto Rico",
                                                    "value" => "PR"
                                                ],
                                                [
                                                    "key" => "Qatar",
                                                    "value" => "QA"
                                                ],
                                                [
                                                    "key" => "Romania",
                                                    "value" => "RO"
                                                ],
                                                [
                                                    "key" => "Russia",
                                                    "value" => "RU"
                                                ],
                                                [
                                                    "key" => "Rwanda",
                                                    "value" => "RW"
                                                ],
                                                [
                                                    "key" => "Réunion",
                                                    "value" => "RE"
                                                ],
                                                [
                                                    "key" => "Samoa",
                                                    "value" => "WS"
                                                ],
                                                [
                                                    "key" => "San Marino",
                                                    "value" => "SM"
                                                ],
                                                [
                                                    "key" => "Saudi Arabia",
                                                    "value" => "SA"
                                                ],
                                                [
                                                    "key" => "Senegal",
                                                    "value" => "SN"
                                                ],
                                                [
                                                    "key" => "Serbia",
                                                    "value" => "RS"
                                                ],
                                                [
                                                    "key" => "Seychelles",
                                                    "value" => "SC"
                                                ],
                                                [
                                                    "key" => "Sierra Leone",
                                                    "value" => "SL"
                                                ],
                                                [
                                                    "key" => "Singapore",
                                                    "value" => "SG"
                                                ],
                                                [
                                                    "key" => "Sint Maarten",
                                                    "value" => "SX"
                                                ],
                                                [
                                                    "key" => "Slovakia",
                                                    "value" => "SK"
                                                ],
                                                [
                                                    "key" => "Slovenia",
                                                    "value" => "SI"
                                                ],
                                                [
                                                    "key" => "Solomon Islands",
                                                    "value" => "SB"
                                                ],
                                                [
                                                    "key" => "Somalia",
                                                    "value" => "SO"
                                                ],
                                                [
                                                    "key" => "South Africa",
                                                    "value" => "ZA"
                                                ],
                                                [
                                                    "key" => "South Georgia & South Sandwich Islands",
                                                    "value" => "GS"
                                                ],
                                                [
                                                    "key" => "South Korea",
                                                    "value" => "KR"
                                                ],
                                                [
                                                    "key" => "South Sudan",
                                                    "value" => "SS"
                                                ],
                                                [
                                                    "key" => "Spain",
                                                    "value" => "ES"
                                                ],
                                                [
                                                    "key" => "Sri Lanka",
                                                    "value" => "LK"
                                                ],
                                                [
                                                    "key" => "St. Barthélemy",
                                                    "value" => "BL"
                                                ],
                                                [
                                                    "key" => "St. Helena",
                                                    "value" => "SH"
                                                ],
                                                [
                                                    "key" => "St. Kitts & Nevis",
                                                    "value" => "KN"
                                                ],
                                                [
                                                    "key" => "St. Lucia",
                                                    "value" => "LC"
                                                ],
                                                [
                                                    "key" => "St. Martin",
                                                    "value" => "MF"
                                                ],
                                                [
                                                    "key" => "St. Pierre & Miquelon",
                                                    "value" => "PM"
                                                ],
                                                [
                                                    "key" => "St. Vincent & Grenadines",
                                                    "value" => "VC"
                                                ],
                                                [
                                                    "key" => "Sudan",
                                                    "value" => "SD"
                                                ],
                                                [
                                                    "key" => "Suriname",
                                                    "value" => "SR"
                                                ],
                                                [
                                                    "key" => "Svalbard & Jan Mayen",
                                                    "value" => "SJ"
                                                ],
                                                [
                                                    "key" => "Sweden",
                                                    "value" => "SE"
                                                ],
                                                [
                                                    "key" => "Switzerland",
                                                    "value" => "CH"
                                                ],
                                                [
                                                    "key" => "Syria",
                                                    "value" => "SY"
                                                ],
                                                [
                                                    "key" => "São Tomé & Príncipe",
                                                    "value" => "ST"
                                                ],
                                                [
                                                    "key" => "Taiwan",
                                                    "value" => "TW"
                                                ],
                                                [
                                                    "key" => "Tajikistan",
                                                    "value" => "TJ"
                                                ],
                                                [
                                                    "key" => "Tanzania",
                                                    "value" => "TZ"
                                                ],
                                                [
                                                    "key" => "Thailand",
                                                    "value" => "TH"
                                                ],
                                                [
                                                    "key" => "Timor-Leste",
                                                    "value" => "TL"
                                                ],
                                                [
                                                    "key" => "Togo",
                                                    "value" => "TG"
                                                ],
                                                [
                                                    "key" => "Tokelau",
                                                    "value" => "TK"
                                                ],
                                                [
                                                    "key" => "Tonga",
                                                    "value" => "TO"
                                                ],
                                                [
                                                    "key" => "Trinidad & Tobago",
                                                    "value" => "TT"
                                                ],
                                                [
                                                    "key" => "Tristan da Cunha",
                                                    "value" => "TA"
                                                ],
                                                [
                                                    "key" => "Tunisia",
                                                    "value" => "TN"
                                                ],
                                                [
                                                    "key" => "Turkey",
                                                    "value" => "TR"
                                                ],
                                                [
                                                    "key" => "Turkmenistan",
                                                    "value" => "TM"
                                                ],
                                                [
                                                    "key" => "Turks & Caicos Islands",
                                                    "value" => "TC"
                                                ],
                                                [
                                                    "key" => "Tuvalu",
                                                    "value" => "TV"
                                                ],
                                                [
                                                    "key" => "U.S. Outlying Islands",
                                                    "value" => "UM"
                                                ],
                                                [
                                                    "key" => "U.S. Virgin Islands",
                                                    "value" => "VI"
                                                ],
                                                [
                                                    "key" => "Uganda",
                                                    "value" => "UG"
                                                ],
                                                [
                                                    "key" => "Ukraine",
                                                    "value" => "UA"
                                                ],
                                                [
                                                    "key" => "United Arab Emirates",
                                                    "value" => "AE"
                                                ],
                                                [
                                                    "key" => "United Kingdom",
                                                    "value" => "GB"
                                                ],
                                                [
                                                    "key" => "United States",
                                                    "value" => "US"
                                                ],
                                                [
                                                    "key" => "Uruguay",
                                                    "value" => "UY"
                                                ],
                                                [
                                                    "key" => "Uzbekistan",
                                                    "value" => "UZ"
                                                ],
                                                [
                                                    "key" => "Vanuatu",
                                                    "value" => "VU"
                                                ],
                                                [
                                                    "key" => "Vatican City",
                                                    "value" => "VA"
                                                ],
                                                [
                                                    "key" => "Venezuela",
                                                    "value" => "VE"
                                                ],
                                                [
                                                    "key" => "Vietnam",
                                                    "value" => "VN"
                                                ],
                                                [
                                                    "key" => "Wallis & Futuna",
                                                    "value" => "WF"
                                                ],
                                                [
                                                    "key" => "Western Sahara",
                                                    "value" => "EH"
                                                ],
                                                [
                                                    "key" => "Yemen",
                                                    "value" => "YE"
                                                ],
                                                [
                                                    "key" => "Zambia",
                                                    "value" => "ZM"
                                                ],
                                                [
                                                    "key" => "Zimbabwe",
                                                    "value" => "ZW"
                                                ],
                                                [
                                                    "key" => "Åland Islands",
                                                    "value" => "AX"
                                                ]
                                            ],
                                            "width" => "",
                                            "defaultValue" => NULL,
                                            "optionsProviderClass" => NULL,
                                            "optionsProviderData" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "dynamicOptions" => FALSE,
                                            "name" => "made_in",
                                            "title" => "Made In",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "category",
                                        "label" => "Category",
                                        "dataType" => "manyToOneRelation",
                                        "layout" => [
                                            "fieldtype" => "manyToOneRelation",
                                            "width" => "",
                                            "assetUploadPath" => "",
                                            "relationType" => TRUE,
                                            "queryColumnType" => [
                                                "id" => "int(11)",
                                                "type" => "enum('document','asset','object')"
                                            ],
                                            "phpdocType" => "\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject",
                                            "objectsAllowed" => TRUE,
                                            "assetsAllowed" => FALSE,
                                            "assetTypes" => [

                                            ],
                                            "documentsAllowed" => FALSE,
                                            "documentTypes" => [

                                            ],
                                            "classes" => [
                                                [
                                                    "classes" => "Category"
                                                ]
                                            ],
                                            "pathFormatterClass" => "",
                                            "name" => "category",
                                            "title" => "Category",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "materials",
                                        "label" => "Materials",
                                        "dataType" => "advancedManyToManyObjectRelation",
                                        "layout" => [
                                            "allowedClassId" => "Material",
                                            "visibleFields" => "key,code,name,typology",
                                            "columns" => [
                                                [
                                                    "type" => "text",
                                                    "position" => 1,
                                                    "key" => "percent",
                                                    "id" => "extModel7626-1",
                                                    "label" => "Percent"
                                                ]
                                            ],
                                            "columnKeys" => [
                                                "percent"
                                            ],
                                            "fieldtype" => "advancedManyToManyObjectRelation",
                                            "phpdocType" => "\\Pimcore\\Model\\DataObject\\Data\\ObjectMetadata[]",
                                            "enableBatchEdit" => FALSE,
                                            "allowMultipleAssignments" => FALSE,
                                            "visibleFieldDefinitions" => [
                                                "key" => [
                                                    "name" => "key",
                                                    "title" => "Key",
                                                    "fieldtype" => "input"
                                                ],
                                                "code" => [
                                                    "name" => "code",
                                                    "title" => "Material Code",
                                                    "fieldtype" => "input",
                                                    "noteditable" => TRUE
                                                ],
                                                "name" => [
                                                    "name" => "name",
                                                    "title" => "Material Name",
                                                    "fieldtype" => "input"
                                                ],
                                                "typology" => [
                                                    "name" => "typology",
                                                    "title" => "Typology",
                                                    "fieldtype" => "select",
                                                    "noteditable" => TRUE,
                                                    "options" => [
                                                        [
                                                            "key" => "Natural",
                                                            "value" => "N"
                                                        ],
                                                        [
                                                            "key" => "Artificial",
                                                            "value" => "A"
                                                        ],
                                                        [
                                                            "key" => "Synthetic",
                                                            "value" => "S"
                                                        ]
                                                    ]
                                                ]
                                            ],
                                            "width" => "",
                                            "height" => "",
                                            "maxItems" => "",
                                            "queryColumnType" => "text",
                                            "relationType" => TRUE,
                                            "allowToCreateNewObject" => TRUE,
                                            "optimizedAdminLoading" => FALSE,
                                            "classes" => [

                                            ],
                                            "pathFormatterClass" => "",
                                            "name" => "materials",
                                            "title" => "Materials",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "color",
                                        "label" => "Color",
                                        "dataType" => "manyToOneRelation",
                                        "layout" => [
                                            "fieldtype" => "manyToOneRelation",
                                            "width" => "",
                                            "assetUploadPath" => "",
                                            "relationType" => TRUE,
                                            "queryColumnType" => [
                                                "id" => "int(11)",
                                                "type" => "enum('document','asset','object')"
                                            ],
                                            "phpdocType" => "\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject",
                                            "objectsAllowed" => TRUE,
                                            "assetsAllowed" => FALSE,
                                            "assetTypes" => [

                                            ],
                                            "documentsAllowed" => FALSE,
                                            "documentTypes" => [

                                            ],
                                            "classes" => [
                                                [
                                                    "classes" => "Color"
                                                ]
                                            ],
                                            "pathFormatterClass" => "",
                                            "name" => "color",
                                            "title" => "Color",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "images",
                                        "label" => "Images",
                                        "dataType" => "fieldcollections",
                                        "layout" => [
                                            "fieldtype" => "fieldcollections",
                                            "phpdocType" => "\\Pimcore\\Model\\DataObject\\Fieldcollection",
                                            "allowedTypes" => [
                                                "ImageInfo"
                                            ],
                                            "lazyLoading" => TRUE,
                                            "maxItems" => "",
                                            "disallowAddRemove" => FALSE,
                                            "disallowReorder" => FALSE,
                                            "collapsed" => FALSE,
                                            "collapsible" => FALSE,
                                            "border" => FALSE,
                                            "name" => "images",
                                            "title" => "Images",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ]
                            ]
                        ]
                    ],
                    "Category" => [
                        "id" => "Category",
                        "name" => "Category",
                        "columnConfig" => [
                            "columns" => [
                                [
                                    "attributes" => [
                                        "attribute" => "code",
                                        "label" => "Category Code",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => TRUE,
                                            "showCharCount" => FALSE,
                                            "name" => "code",
                                            "title" => "Category Code",
                                            "tooltip" => "",
                                            "mandatory" => TRUE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "name",
                                        "label" => "Category Name",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => FALSE,
                                            "showCharCount" => FALSE,
                                            "name" => "name",
                                            "title" => "Category Name",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "description",
                                        "label" => "description",
                                        "dataType" => "wysiwyg",
                                        "layout" => [
                                            "fieldtype" => "wysiwyg",
                                            "width" => "",
                                            "height" => "",
                                            "queryColumnType" => "longtext",
                                            "columnType" => "longtext",
                                            "phpdocType" => "string",
                                            "toolbarConfig" => "",
                                            "excludeFromSearchIndex" => FALSE,
                                            "name" => "description",
                                            "title" => "description",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ]
                            ]
                        ]
                    ],
                    "Color" => [
                        "id" => "Color",
                        "name" => "Color",
                        "columnConfig" => [
                            "columns" => [
                                [
                                    "attributes" => [
                                        "attribute" => "name",
                                        "label" => "Name",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => FALSE,
                                            "showCharCount" => FALSE,
                                            "name" => "name",
                                            "title" => "Name",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "color",
                                        "label" => "Color",
                                        "dataType" => "rgbaColor",
                                        "layout" => [
                                            "fieldtype" => "rgbaColor",
                                            "width" => NULL,
                                            "queryColumnType" => [
                                                "rgb" => "VARCHAR(6) NULL DEFAULT NULL",
                                                "a" => "VARCHAR(2) NULL DEFAULT NULL"
                                            ],
                                            "columnType" => [
                                                "rgb" => "VARCHAR(6) NULL DEFAULT NULL",
                                                "a" => "VARCHAR(2) NULL DEFAULT NULL"
                                            ],
                                            "phpdocType" => "\\Pimcore\\Model\\DataObject\\Data\\RgbaColor",
                                            "name" => "color",
                                            "title" => "Color",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ]
                            ]
                        ]
                    ],
                    "Material" => [
                        "id" => "Material",
                        "name" => "Material",
                        "columnConfig" => [
                            "columns" => [
                                [
                                    "attributes" => [
                                        "attribute" => "code",
                                        "label" => "Material Code",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => TRUE,
                                            "showCharCount" => FALSE,
                                            "name" => "code",
                                            "title" => "Material Code",
                                            "tooltip" => "",
                                            "mandatory" => TRUE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "typology",
                                        "label" => "Typology",
                                        "dataType" => "select",
                                        "layout" => [
                                            "fieldtype" => "select",
                                            "options" => [
                                                [
                                                    "key" => "Natural",
                                                    "value" => "N"
                                                ],
                                                [
                                                    "key" => "Artificial",
                                                    "value" => "A"
                                                ],
                                                [
                                                    "key" => "Synthetic",
                                                    "value" => "S"
                                                ]
                                            ],
                                            "width" => "",
                                            "defaultValue" => "",
                                            "optionsProviderClass" => "",
                                            "optionsProviderData" => "",
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "dynamicOptions" => FALSE,
                                            "name" => "typology",
                                            "title" => "Typology",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "name",
                                        "label" => "Material Name",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => FALSE,
                                            "showCharCount" => FALSE,
                                            "name" => "name",
                                            "title" => "Material Name",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "description",
                                        "label" => "Description",
                                        "dataType" => "textarea",
                                        "layout" => [
                                            "fieldtype" => "textarea",
                                            "width" => 500,
                                            "height" => 100,
                                            "maxLength" => NULL,
                                            "showCharCount" => FALSE,
                                            "excludeFromSearchIndex" => FALSE,
                                            "queryColumnType" => "longtext",
                                            "columnType" => "longtext",
                                            "phpdocType" => "string",
                                            "name" => "description",
                                            "title" => "Description",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ]
                            ]
                        ]
                    ]
                ],
                "mutationEntities" => [
                    "Product" => [
                        "id" => "Product",
                        "name" => "Product",
                        "update" => TRUE,
                        "create" => TRUE,
                        "columnConfig" => [
                            "columns" => [
                                [
                                    "attributes" => [
                                        "attribute" => "sku",
                                        "label" => "SKU",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => TRUE,
                                            "showCharCount" => FALSE,
                                            "name" => "sku",
                                            "title" => "SKU",
                                            "tooltip" => "",
                                            "mandatory" => TRUE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "name",
                                        "label" => "Product Name",
                                        "dataType" => "input",
                                        "layout" => [
                                            "fieldtype" => "input",
                                            "width" => NULL,
                                            "defaultValue" => NULL,
                                            "queryColumnType" => "varchar",
                                            "columnType" => "varchar",
                                            "columnLength" => 190,
                                            "phpdocType" => "string",
                                            "regex" => "",
                                            "unique" => FALSE,
                                            "showCharCount" => FALSE,
                                            "name" => "name",
                                            "title" => "Product Name",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE,
                                            "defaultValueGenerator" => ""
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "short_description",
                                        "label" => "Short Description",
                                        "dataType" => "textarea",
                                        "layout" => [
                                            "fieldtype" => "textarea",
                                            "width" => 500,
                                            "height" => 100,
                                            "maxLength" => NULL,
                                            "showCharCount" => FALSE,
                                            "excludeFromSearchIndex" => FALSE,
                                            "queryColumnType" => "longtext",
                                            "columnType" => "longtext",
                                            "phpdocType" => "string",
                                            "name" => "short_description",
                                            "title" => "Short Description",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "description",
                                        "label" => "Description",
                                        "dataType" => "wysiwyg",
                                        "layout" => [
                                            "fieldtype" => "wysiwyg",
                                            "width" => "",
                                            "height" => "",
                                            "queryColumnType" => "longtext",
                                            "columnType" => "longtext",
                                            "phpdocType" => "string",
                                            "toolbarConfig" => "",
                                            "excludeFromSearchIndex" => FALSE,
                                            "name" => "description",
                                            "title" => "Description",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "relationType" => FALSE,
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ],
                                [
                                    "attributes" => [
                                        "attribute" => "category",
                                        "label" => "Category",
                                        "dataType" => "manyToOneRelation",
                                        "layout" => [
                                            "fieldtype" => "manyToOneRelation",
                                            "width" => "",
                                            "assetUploadPath" => "",
                                            "relationType" => TRUE,
                                            "queryColumnType" => [
                                                "id" => "int(11)",
                                                "type" => "enum('document','asset','object')"
                                            ],
                                            "phpdocType" => "\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject",
                                            "objectsAllowed" => TRUE,
                                            "assetsAllowed" => FALSE,
                                            "assetTypes" => [

                                            ],
                                            "documentsAllowed" => FALSE,
                                            "documentTypes" => [

                                            ],
                                            "classes" => [
                                                [
                                                    "classes" => "Category"
                                                ]
                                            ],
                                            "pathFormatterClass" => "",
                                            "name" => "category",
                                            "title" => "Category",
                                            "tooltip" => "",
                                            "mandatory" => FALSE,
                                            "noteditable" => FALSE,
                                            "index" => FALSE,
                                            "locked" => FALSE,
                                            "style" => "",
                                            "permissions" => NULL,
                                            "datatype" => "data",
                                            "invisible" => FALSE,
                                            "visibleGridView" => FALSE,
                                            "visibleSearch" => FALSE
                                        ]
                                    ],
                                    "isOperator" => FALSE
                                ]
                            ]
                        ],
                        "delete" => TRUE
                    ]
                ],
                "specialEntities" => [
                    "document" => [
                        "read" => FALSE,
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE
                    ],
                    "document_folder" => [
                        "read" => FALSE,
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE
                    ],
                    "asset" => [
                        "read" => FALSE,
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE
                    ],
                    "asset_folder" => [
                        "read" => FALSE,
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE
                    ],
                    "asset_listing" => [
                        "read" => FALSE,
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE
                    ],
                    "object_folder" => [
                        "read" => FALSE,
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE
                    ]
                ]
            ],
            "security" => [
                "method" => "datahub_apikey",
                "apikey" => "ada60c2ac58fa2b195cf20ee3b31671b",
                "skipPermissionCheck" => FALSE
            ],
            "workspaces" => [
                "asset" => [
                    [
                        "read" => TRUE,
                        "cpath" => "/Products",
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE,
                        "id" => "extModel725-1"
                    ]
                ],
                "document" => [

                ],
                "object" => [
                    [
                        "read" => TRUE,
                        "cpath" => "/Products",
                        "create" => TRUE,
                        "update" => TRUE,
                        "delete" => TRUE,
                        "id" => "extModel757-1"
                    ],
                    [
                        "read" => TRUE,
                        "cpath" => "/Colors",
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE,
                        "id" => "extModel757-2"
                    ],
                    [
                        "read" => TRUE,
                        "cpath" => "/Categories",
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE,
                        "id" => "extModel757-3"
                    ],
                    [
                        "read" => TRUE,
                        "cpath" => "/Materials",
                        "create" => FALSE,
                        "update" => FALSE,
                        "delete" => FALSE,
                        "id" => "extModel757-4"
                    ]
                ]
            ]
        ],
        "products-import" => [
            "general" => [
                "active" => TRUE,
                "type" => "dataImporterDataObject",
                "name" => "products-import",
                "description" => "",
                "path" => NULL
            ],
            "loaderConfig" => [
                "type" => "asset",
                "settings" => [
                    "assetPath" => "/Import/Products Import.csv"
                ]
            ],
            "interpreterConfig" => [
                "type" => "csv",
                "settings" => [
                    "skipFirstRow" => TRUE,
                    "delimiter" => ",",
                    "enclosure" => "\"",
                    "escape" => "\\"
                ]
            ],
            "resolverConfig" => [
                "elementType" => "dataObject",
                "dataObjectClassId" => "PRD",
                "loadingStrategy" => [
                    "type" => "path",
                    "settings" => [
                        "dataSourceIndex" => "0"
                    ]
                ],
                "createLocationStrategy" => [
                    "type" => "staticPath",
                    "settings" => [
                        "path" => "/"
                    ]
                ],
                "locationUpdateStrategy" => [
                    "type" => "staticPath",
                    "settings" => [
                        "path" => "/"
                    ]
                ],
                "publishingStrategy" => [
                    "type" => "noChangePublishNew"
                ]
            ],
            "processingConfig" => [
                "executionType" => "parallel",
                "idDataIndex" => ""
            ],
            "mappingConfig" => [
                [
                    "label" => "SKU",
                    "dataSourceIndex" => [
                        "1"
                    ],
                    "transformationResultType" => "default",
                    "dataTarget" => [
                        "type" => "direct",
                        "settings" => [
                            "fieldName" => "sku",
                            "language" => ""
                        ]
                    ],
                    "transformationPipeline" => [

                    ]
                ],
                [
                    "label" => "Name",
                    "dataSourceIndex" => [
                        "4"
                    ],
                    "transformationResultType" => "default",
                    "dataTarget" => [
                        "type" => "direct",
                        "settings" => [
                            "fieldName" => "name",
                            "language" => "it"
                        ]
                    ],
                    "transformationPipeline" => [

                    ]
                ],
                [
                    "label" => "Brand",
                    "dataSourceIndex" => [
                        "5"
                    ],
                    "transformationResultType" => "default",
                    "dataTarget" => [
                        "type" => "direct",
                        "settings" => [
                            "fieldName" => "brand",
                            "language" => ""
                        ]
                    ],
                    "transformationPipeline" => [

                    ]
                ],
                [
                    "label" => "Price",
                    "dataSourceIndex" => [
                        "2",
                        "3"
                    ],
                    "transformationResultType" => "quantityValue",
                    "dataTarget" => [
                        "type" => "direct",
                        "settings" => [
                            "fieldName" => "price",
                            "language" => ""
                        ]
                    ],
                    "transformationPipeline" => [
                        [
                            "type" => "quantityValue"
                        ]
                    ]
                ],
                [
                    "label" => "Category",
                    "dataSourceIndex" => [
                        "6"
                    ],
                    "settings" => [
                        "loadStrategy" => "path",
                        "attributeDataObjectClassId" => "",
                        "attributeName" => "",
                        "attributeLanguage" => ""
                    ],
                    "transformationResultType" => "dataObject",
                    "dataTarget" => [
                        "type" => "direct",
                        "settings" => [
                            "fieldName" => "category",
                            "language" => ""
                        ]
                    ],
                    "transformationPipeline" => [
                        [
                            "settings" => [
                                "loadStrategy" => "path",
                                "attributeDataObjectClassId" => "",
                                "attributeName" => "",
                                "attributeLanguage" => ""
                            ],
                            "type" => "loadDataObject"
                        ]
                    ]
                ]
            ],
            "executionConfig" => [
                "cronDefinition" => ""
            ],
            "workspaces" => [

            ]
        ]
    ]
];
