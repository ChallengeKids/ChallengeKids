<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/category' => [[['_route' => 'app_category_index', '_controller' => 'App\\Controller\\CategoryController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/category/new' => [[['_route' => 'app_category_new', '_controller' => 'App\\Controller\\CategoryController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/challenge' => [[['_route' => 'challenge_index', '_controller' => 'App\\Controller\\ChallengeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/challenge/new' => [[['_route' => 'challenge_new', '_controller' => 'App\\Controller\\ChallengeController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/chapter' => [[['_route' => 'app_chapter_index', '_controller' => 'App\\Controller\\ChapterController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/chapter/new' => [[['_route' => 'app_chapter_new', '_controller' => 'App\\Controller\\ChapterController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/coach' => [[['_route' => 'app_coach_index', '_controller' => 'App\\Controller\\CoachController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/coach/new' => [[['_route' => 'app_coach_new', '_controller' => 'App\\Controller\\CoachController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/kid' => [[['_route' => 'app_kid_index', '_controller' => 'App\\Controller\\KidController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/kid/new' => [[['_route' => 'app_kid_new', '_controller' => 'App\\Controller\\KidController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/kid/parent/new' => [[['_route' => 'app_kid_parent_new', '_controller' => 'App\\Controller\\KidParentController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/kidResponse' => [[['_route' => 'app_response_index', '_controller' => 'App\\Controller\\KidResponseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/kidResponse/new' => [[['_route' => 'app_response_new', '_controller' => 'App\\Controller\\KidResponseController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/lesson' => [[['_route' => 'app_lesson_index', '_controller' => 'App\\Controller\\LessonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/lesson/new' => [[['_route' => 'app_lesson_new', '_controller' => 'App\\Controller\\LessonController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/option' => [[['_route' => 'app_option_index', '_controller' => 'App\\Controller\\OptionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/option/new' => [[['_route' => 'app_option_new', '_controller' => 'App\\Controller\\OptionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/post' => [[['_route' => 'app_post_index', '_controller' => 'App\\Controller\\PostController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/post/new' => [[['_route' => 'app_post_new', '_controller' => 'App\\Controller\\PostController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/question' => [[['_route' => 'app_question_index', '_controller' => 'App\\Controller\\QuestionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/question/new' => [[['_route' => 'app_question_new', '_controller' => 'App\\Controller\\QuestionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/quiz' => [[['_route' => 'app_quiz_index', '_controller' => 'App\\Controller\\QuizController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/quiz/new' => [[['_route' => 'app_quiz_new', '_controller' => 'App\\Controller\\QuizController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/doc' => [
            [['_route' => 'app.swagger_ui', '_controller' => 'nelmio_api_doc.controller.swagger_ui'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app.redocly', '_controller' => 'nelmio_api_doc.controller.redocly'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/doc.json' => [[['_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/api/(?'
                    .'|c(?'
                        .'|ategory/([^/]++)(?'
                            .'|(*:233)'
                            .'|/edit(*:246)'
                            .'|(*:254)'
                        .')'
                        .'|ha(?'
                            .'|llenge/(?'
                                .'|([^/]++)(?'
                                    .'|(*:289)'
                                    .'|/edit(*:302)'
                                .')'
                                .'|delete/([^/]++)(*:326)'
                            .')'
                            .'|pter/([^/]++)(?'
                                .'|(*:351)'
                                .'|/edit(*:364)'
                                .'|(*:372)'
                            .')'
                        .')'
                        .'|oach/([^/]++)(?'
                            .'|(*:398)'
                            .'|/edit(*:411)'
                            .'|(*:419)'
                        .')'
                    .')'
                    .'|kid(?'
                        .'|/(?'
                            .'|([^/]++)(?'
                                .'|(*:450)'
                                .'|/edit(*:463)'
                                .'|(*:471)'
                            .')'
                            .'|parent(?'
                                .'|(*:489)'
                                .'|/([^/]++)(?'
                                    .'|(*:509)'
                                    .'|/edit(*:522)'
                                    .'|(*:530)'
                                .')'
                            .')'
                        .')'
                        .'|Response/([^/]++)(?'
                            .'|(*:561)'
                            .'|/edit(*:574)'
                            .'|(*:582)'
                        .')'
                    .')'
                    .'|lesson/([^/]++)(?'
                        .'|(*:610)'
                        .'|/edit(*:623)'
                        .'|(*:631)'
                    .')'
                    .'|option/([^/]++)(?'
                        .'|(*:658)'
                        .'|/edit(*:671)'
                        .'|(*:679)'
                    .')'
                    .'|post/([^/]++)(?'
                        .'|(*:704)'
                        .'|/edit(*:717)'
                        .'|(*:725)'
                    .')'
                    .'|qu(?'
                        .'|estion/([^/]++)(?'
                            .'|(*:757)'
                            .'|/edit(*:770)'
                            .'|(*:778)'
                        .')'
                        .'|iz/([^/]++)(?'
                            .'|(*:801)'
                            .'|/edit(*:814)'
                            .'|(*:822)'
                        .')'
                    .')'
                    .'|user/([^/]++)(?'
                        .'|(*:848)'
                        .'|/edit(*:861)'
                        .'|(*:869)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        233 => [[['_route' => 'app_category_show', '_controller' => 'App\\Controller\\CategoryController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        246 => [[['_route' => 'app_category_edit', '_controller' => 'App\\Controller\\CategoryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        254 => [[['_route' => 'app_category_delete', '_controller' => 'App\\Controller\\CategoryController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        289 => [[['_route' => 'challenge_show', '_controller' => 'App\\Controller\\ChallengeController::show'], ['title'], ['GET' => 0], null, false, true, null]],
        302 => [[['_route' => 'challenge_edit', '_controller' => 'App\\Controller\\ChallengeController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        326 => [[['_route' => 'challenge_delete', '_controller' => 'App\\Controller\\ChallengeController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        351 => [[['_route' => 'app_chapter_show', '_controller' => 'App\\Controller\\ChapterController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        364 => [[['_route' => 'app_chapter_edit', '_controller' => 'App\\Controller\\ChapterController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        372 => [[['_route' => 'app_chapter_delete', '_controller' => 'App\\Controller\\ChapterController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        398 => [[['_route' => 'app_coach_show', '_controller' => 'App\\Controller\\CoachController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        411 => [[['_route' => 'app_coach_edit', '_controller' => 'App\\Controller\\CoachController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        419 => [[['_route' => 'app_coach_delete', '_controller' => 'App\\Controller\\CoachController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        450 => [[['_route' => 'app_kid_show', '_controller' => 'App\\Controller\\KidController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        463 => [[['_route' => 'app_kid_edit', '_controller' => 'App\\Controller\\KidController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        471 => [[['_route' => 'app_kid_delete', '_controller' => 'App\\Controller\\KidController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        489 => [[['_route' => 'app_kid_parent_index', '_controller' => 'App\\Controller\\KidParentController::index'], [], ['GET' => 0], null, true, false, null]],
        509 => [[['_route' => 'app_kid_parent_show', '_controller' => 'App\\Controller\\KidParentController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        522 => [[['_route' => 'app_kid_parent_edit', '_controller' => 'App\\Controller\\KidParentController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        530 => [[['_route' => 'app_kid_parent_delete', '_controller' => 'App\\Controller\\KidParentController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        561 => [[['_route' => 'app_response_show', '_controller' => 'App\\Controller\\KidResponseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        574 => [[['_route' => 'app_response_edit', '_controller' => 'App\\Controller\\KidResponseController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        582 => [[['_route' => 'app_response_delete', '_controller' => 'App\\Controller\\KidResponseController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        610 => [[['_route' => 'app_lesson_show', '_controller' => 'App\\Controller\\LessonController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        623 => [[['_route' => 'app_lesson_edit', '_controller' => 'App\\Controller\\LessonController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        631 => [[['_route' => 'app_lesson_delete', '_controller' => 'App\\Controller\\LessonController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        658 => [[['_route' => 'app_option_show', '_controller' => 'App\\Controller\\OptionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        671 => [[['_route' => 'app_option_edit', '_controller' => 'App\\Controller\\OptionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        679 => [[['_route' => 'app_option_delete', '_controller' => 'App\\Controller\\OptionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        704 => [[['_route' => 'app_post_show', '_controller' => 'App\\Controller\\PostController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        717 => [[['_route' => 'app_post_edit', '_controller' => 'App\\Controller\\PostController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        725 => [[['_route' => 'app_post_delete', '_controller' => 'App\\Controller\\PostController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        757 => [[['_route' => 'app_question_show', '_controller' => 'App\\Controller\\QuestionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        770 => [[['_route' => 'app_question_edit', '_controller' => 'App\\Controller\\QuestionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        778 => [[['_route' => 'app_question_delete', '_controller' => 'App\\Controller\\QuestionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        801 => [[['_route' => 'app_quiz_show', '_controller' => 'App\\Controller\\QuizController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        814 => [[['_route' => 'app_quiz_edit', '_controller' => 'App\\Controller\\QuizController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        822 => [[['_route' => 'app_quiz_delete', '_controller' => 'App\\Controller\\QuizController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        848 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        861 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        869 => [
            [['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
