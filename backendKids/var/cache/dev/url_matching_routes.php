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
        '/api/category' => [[['_route' => 'category_index', '_controller' => 'App\\Controller\\CategoryController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/category/new' => [[['_route' => 'category_new', '_controller' => 'App\\Controller\\CategoryController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/challenge' => [[['_route' => 'challenge_index', '_controller' => 'App\\Controller\\ChallengeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/challenge/new' => [[['_route' => 'challenge_new', '_controller' => 'App\\Controller\\ChallengeController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/chapter' => [[['_route' => 'chapter_index', '_controller' => 'App\\Controller\\ChapterController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/chapter/new' => [[['_route' => 'chapter_new', '_controller' => 'App\\Controller\\ChapterController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/coach' => [[['_route' => 'coach_index', '_controller' => 'App\\Controller\\CoachController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/coach/registration' => [[['_route' => 'coach_new', '_controller' => 'App\\Controller\\CoachController::registration'], null, ['POST' => 0], null, false, false, null]],
        '/api/kid' => [[['_route' => 'kid_index', '_controller' => 'App\\Controller\\KidController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/kid/registration' => [[['_route' => 'kid_new', '_controller' => 'App\\Controller\\KidController::registration'], null, ['POST' => 0], null, false, false, null]],
        '/api/kidParent' => [[['_route' => 'kid_parent_index', '_controller' => 'App\\Controller\\KidParentController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/kidParent/registration' => [[['_route' => 'kid_parent_new', '_controller' => 'App\\Controller\\KidParentController::registration'], null, ['POST' => 0], null, false, false, null]],
        '/api/kidResponse' => [[['_route' => 'response_index', '_controller' => 'App\\Controller\\KidResponseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/kidResponse/new' => [[['_route' => 'response_new', '_controller' => 'App\\Controller\\KidResponseController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/lesson' => [[['_route' => 'lesson_index', '_controller' => 'App\\Controller\\LessonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/lesson/new' => [[['_route' => 'lesson_new', '_controller' => 'App\\Controller\\LessonController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/option' => [[['_route' => 'option_index', '_controller' => 'App\\Controller\\OptionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/option/new' => [[['_route' => 'option_new', '_controller' => 'App\\Controller\\OptionController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/post' => [[['_route' => 'post_index', '_controller' => 'App\\Controller\\PostController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/post/new' => [[['_route' => 'post_new', '_controller' => 'App\\Controller\\PostController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/question' => [[['_route' => 'question_index', '_controller' => 'App\\Controller\\QuestionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/question/new' => [[['_route' => 'question_new', '_controller' => 'App\\Controller\\QuestionController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/quiz' => [[['_route' => 'app_quiz_index', '_controller' => 'App\\Controller\\QuizController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/quiz/new' => [[['_route' => 'app_quiz_new', '_controller' => 'App\\Controller\\QuizController::new'], null, ['POST' => 0], null, false, false, null]],
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
                        .'|ategory/(?'
                            .'|([^/]++)(*:233)'
                            .'|delete/([^/]++)(*:256)'
                        .')'
                        .'|ha(?'
                            .'|llenge/(?'
                                .'|([^/]++)(?'
                                    .'|(*:291)'
                                    .'|/edit(*:304)'
                                .')'
                                .'|delete/([^/]++)(*:328)'
                            .')'
                            .'|pter/(?'
                                .'|([^/]++)(?'
                                    .'|(*:356)'
                                    .'|/edit(*:369)'
                                .')'
                                .'|delete/([^/]++)(*:393)'
                            .')'
                        .')'
                        .'|oach/(?'
                            .'|([^/]++)(?'
                                .'|(*:422)'
                                .'|/changePassword(*:445)'
                            .')'
                            .'|delete/([^/]++)(*:469)'
                        .')'
                    .')'
                    .'|kid(?'
                        .'|/(?'
                            .'|([^/]++)(?'
                                .'|(*:500)'
                                .'|/changePassword(*:523)'
                            .')'
                            .'|delete/([^/]++)(*:547)'
                        .')'
                        .'|Parent/(?'
                            .'|([^/]++)(?'
                                .'|(*:577)'
                                .'|/changePassword(*:600)'
                            .')'
                            .'|delete/([^/]++)(*:624)'
                        .')'
                        .'|Response/([^/]++)(*:650)'
                    .')'
                    .'|lesson/(?'
                        .'|([^/]++)(?'
                            .'|(*:680)'
                            .'|/edit(*:693)'
                        .')'
                        .'|delete/([^/]++)(*:717)'
                    .')'
                    .'|option/(?'
                        .'|([^/]++)(?'
                            .'|(*:747)'
                            .'|/edit(*:760)'
                        .')'
                        .'|delete/([^/]++)(*:784)'
                    .')'
                    .'|post/([^/]++)(?'
                        .'|(*:809)'
                        .'|/edit(*:822)'
                        .'|(*:830)'
                    .')'
                    .'|qu(?'
                        .'|estion/(?'
                            .'|([^/]++)(?'
                                .'|(*:865)'
                                .'|/edit(*:878)'
                            .')'
                            .'|delete/([^/]++)(*:902)'
                        .')'
                        .'|iz/([^/]++)(?'
                            .'|(*:925)'
                        .')'
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
        233 => [[['_route' => 'category_show', '_controller' => 'App\\Controller\\CategoryController::show'], ['type'], ['GET' => 0], null, false, true, null]],
        256 => [[['_route' => 'category_delete', '_controller' => 'App\\Controller\\CategoryController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        291 => [[['_route' => 'challenge_show', '_controller' => 'App\\Controller\\ChallengeController::show'], ['title'], ['GET' => 0], null, false, true, null]],
        304 => [[['_route' => 'challenge_edit', '_controller' => 'App\\Controller\\ChallengeController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        328 => [[['_route' => 'challenge_delete', '_controller' => 'App\\Controller\\ChallengeController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        356 => [[['_route' => 'chapter_show', '_controller' => 'App\\Controller\\ChapterController::show'], ['title'], ['GET' => 0], null, false, true, null]],
        369 => [[['_route' => 'chapter_edit', '_controller' => 'App\\Controller\\ChapterController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        393 => [[['_route' => 'chapter_delete', '_controller' => 'App\\Controller\\ChapterController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        422 => [[['_route' => 'coach_show', '_controller' => 'App\\Controller\\CoachController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        445 => [[['_route' => 'coach_edit', '_controller' => 'App\\Controller\\CoachController::changePassword'], ['id'], ['PUT' => 0], null, false, false, null]],
        469 => [[['_route' => 'coach_delete', '_controller' => 'App\\Controller\\CoachController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        500 => [[['_route' => 'kid_show', '_controller' => 'App\\Controller\\KidController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        523 => [[['_route' => 'kid_edit', '_controller' => 'App\\Controller\\KidController::changePassword'], ['id'], ['PUT' => 0], null, false, false, null]],
        547 => [[['_route' => 'kid_delete', '_controller' => 'App\\Controller\\KidController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        577 => [[['_route' => 'kid_parent_show', '_controller' => 'App\\Controller\\KidParentController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        600 => [[['_route' => 'kid_parent_edit', '_controller' => 'App\\Controller\\KidParentController::changePassword'], ['id'], ['PUT' => 0], null, false, false, null]],
        624 => [[['_route' => 'kid_parent_delete', '_controller' => 'App\\Controller\\KidParentController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        650 => [[['_route' => 'response_show', '_controller' => 'App\\Controller\\KidResponseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        680 => [[['_route' => 'lesson_show', '_controller' => 'App\\Controller\\LessonController::show'], ['title'], ['GET' => 0], null, false, true, null]],
        693 => [[['_route' => 'lesson_edit', '_controller' => 'App\\Controller\\LessonController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        717 => [[['_route' => 'lesson_delete', '_controller' => 'App\\Controller\\LessonController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        747 => [[['_route' => 'option_show', '_controller' => 'App\\Controller\\OptionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        760 => [[['_route' => 'option_edit', '_controller' => 'App\\Controller\\OptionController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        784 => [[['_route' => 'option_delete', '_controller' => 'App\\Controller\\OptionController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        809 => [[['_route' => 'post_show', '_controller' => 'App\\Controller\\PostController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        822 => [[['_route' => 'post_edit', '_controller' => 'App\\Controller\\PostController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        830 => [[['_route' => 'post_delete', '_controller' => 'App\\Controller\\PostController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        865 => [[['_route' => 'question_show', '_controller' => 'App\\Controller\\QuestionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        878 => [[['_route' => 'question_edit', '_controller' => 'App\\Controller\\QuestionController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        902 => [[['_route' => 'question_delete', '_controller' => 'App\\Controller\\QuestionController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        925 => [
            [['_route' => 'app_quiz_show', '_controller' => 'App\\Controller\\QuizController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_quiz_delete', '_controller' => 'App\\Controller\\QuizController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
