<?php
 return [
    "default" => [
        "elementTree" => [
            [
                "type" => "documents",
                "position" => "left",
                "expanded" => false,
                "hidden" => false,
                "sort" => 0,
                "treeContextMenu" => [
                    "document" => [
                        "items" => [
                            "addPrintPage" => false
                        ]
                    ]
                ]
            ],
            [
                "type" => "assets",
                "position" => "left",
                "expanded" => false,
                "hidden" => false,
                "sort" => 1
            ],
            [
                "type" => "objects",
                "position" => "left",
                "expanded" => false,
                "hidden" => false,
                "sort" => 2
            ]
        ],
        "iconCls" => "pimcore_nav_icon_perspective",
        "icon" => NULL,
        "dashboards" => [
            "predefined" => [
                "welcome" => [
                    "positions" => [
                        [
                            [
                                "id" => 1,
                                "type" => "pimcore.layout.portlets.modificationStatistic",
                                "config" => NULL
                            ],
                            [
                                "id" => 2,
                                "type" => "pimcore.layout.portlets.modifiedAssets",
                                "config" => NULL
                            ]
                        ],
                        [
                            [
                                "id" => 3,
                                "type" => "pimcore.layout.portlets.modifiedObjects",
                                "config" => NULL
                            ],
                            [
                                "id" => 4,
                                "type" => "pimcore.layout.portlets.modifiedDocuments",
                                "config" => NULL
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    "MyFirstPerspective" => [
        "elementTree" => [
            [
                "type" => "documents",
                "position" => "left",
                "sort" => 0,
                "treeContextMenu" => [
                    "document" => [
                        "items" => [
                            "add" => true,
                            "addSnippet" => true,
                            "addLink" => true,
                            "addEmail" => true,
                            "addNewsletter" => true,
                            "addHardlink" => true,
                            "addFolder" => true,
                            "addPrintPage" => true,
                            "paste" => true,
                            "pasteCut" => true,
                            "copy" => true,
                            "cut" => true,
                            "rename" => true,
                            "unpublish" => true,
                            "publish" => true,
                            "delete" => true,
                            "open" => true,
                            "convert" => true,
                            "searchAndMove" => true,
                            "useAsSite" => true,
                            "editSite" => true,
                            "removeSite" => true,
                            "lock" => true,
                            "unlock" => true,
                            "lockAndPropagate" => true,
                            "unlockAndPropagate" => true,
                            "reload" => true
                        ]
                    ]
                ]
            ],
            [
                "type" => "assets",
                "position" => "left",
                "sort" => 1,
                "treeContextMenu" => [
                    "asset" => [
                        "items" => [
                            "add" => [
                                "hidden" => false,
                                "items" => [
                                    "upload" => true,
                                    "uploadCompatibility" => true,
                                    "uploadZip" => true,
                                    "importFromServer" => true,
                                    "uploadFromUrl" => true
                                ]
                            ],
                            "addFolder" => true,
                            "rename" => true,
                            "copy" => true,
                            "cut" => true,
                            "paste" => true,
                            "pasteCut" => true,
                            "delete" => true,
                            "searchAndMove" => true,
                            "lock" => true,
                            "unlock" => true,
                            "lockAndPropagate" => true,
                            "unlockAndPropagate" => true,
                            "reload" => true
                        ]
                    ]
                ]
            ],
            [
                "type" => "objects",
                "position" => "right",
                "sort" => 0,
                "treeContextMenu" => [
                    "object" => [
                        "items" => [
                            "add" => true,
                            "addFolder" => true,
                            "importCsv" => true,
                            "cut" => true,
                            "copy" => true,
                            "paste" => true,
                            "delete" => true,
                            "rename" => true,
                            "reload" => true,
                            "publish" => true,
                            "unpublish" => true,
                            "searchAndMove" => true,
                            "lock" => true,
                            "unlock" => true,
                            "lockAndPropagate" => true,
                            "unlockAndPropagate" => true,
                            "changeChildrenSortBy" => true
                        ]
                    ]
                ]
            ]
        ],
        "iconCls" => NULL,
        "icon" => NULL
    ]
];