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
        '/api/kid' => [[['_route' => 'kid_index', '_controller' => 'App\\Controller\\KidController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/kidParent' => [[['_route' => 'kid_parent_index', '_controller' => 'App\\Controller\\KidParentController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/kidResponse' => [[['_route' => 'response_index', '_controller' => 'App\\Controller\\KidResponseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/lesson' => [[['_route' => 'lesson_index', '_controller' => 'App\\Controller\\LessonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/lesson/new' => [[['_route' => 'lesson_new', '_controller' => 'App\\Controller\\LessonController::new'], null, ['POST' => 0], null, false, false, null]],
        '/api/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, ['POST' => 0], null, false, false, null]],
        '/api/login_check' => [
            [['_route' => 'app_login_check', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_login_check'], null, null, null, false, false, null],
        ],
        '/api/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, ['POST' => 0], null, false, false, null]],
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
                        .'|Response/([^/]++)(?'
                            .'|/([^/]++)/new(*:666)'
                            .'|(*:674)'
                        .')'
                    .')'
                    .'|lesson/(?'
                        .'|([^/]++)(?'
                            .'|(*:705)'
                            .'|/edit(*:718)'
                        .')'
                        .'|delete/([^/]++)(*:742)'
                    .')'
                    .'|option/(?'
                        .'|([^/]++)(?'
                            .'|(*:772)'
                            .'|/(?'
                                .'|new(*:787)'
                                .'|edit(*:799)'
                            .')'
                            .'|(*:808)'
                        .')'
                        .'|delete/([^/]++)(*:832)'
                    .')'
                    .'|post/([^/]++)(?'
                        .'|(*:857)'
                        .'|(*:865)'
                        .'|/(?'
                            .'|([^/]++)(?'
                                .'|(*:888)'
                                .'|/new(*:900)'
                            .')'
                            .'|new(*:912)'
                            .'|edit(*:924)'
                        .')'
                        .'|(*:933)'
                    .')'
                    .'|qu(?'
                        .'|estion/(?'
                            .'|([^/]++)(?'
                                .'|(*:968)'
                                .'|/(?'
                                    .'|new(*:983)'
                                    .'|edit(*:995)'
                                .')'
                                .'|(*:1004)'
                            .')'
                            .'|delete/([^/]++)(*:1029)'
                        .')'
                        .'|iz/([^/]++)(?'
                            .'|(*:1053)'
                            .'|/new(*:1066)'
                            .'|(*:1075)'
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
        666 => [[['_route' => 'response_new', '_controller' => 'App\\Controller\\KidResponseController::new'], ['kid', 'quiz'], ['POST' => 0], null, false, false, null]],
        674 => [[['_route' => 'response_show', '_controller' => 'App\\Controller\\KidResponseController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        705 => [[['_route' => 'lesson_show', '_controller' => 'App\\Controller\\LessonController::show'], ['title'], ['GET' => 0], null, false, true, null]],
        718 => [[['_route' => 'lesson_edit', '_controller' => 'App\\Controller\\LessonController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        742 => [[['_route' => 'lesson_delete', '_controller' => 'App\\Controller\\LessonController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        772 => [[['_route' => 'option_index', '_controller' => 'App\\Controller\\OptionController::index'], ['question'], ['GET' => 0], null, false, true, null]],
        787 => [[['_route' => 'option_new', '_controller' => 'App\\Controller\\OptionController::new'], ['question'], ['POST' => 0], null, false, false, null]],
        799 => [[['_route' => 'option_edit', '_controller' => 'App\\Controller\\OptionController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        808 => [[['_route' => 'option_show', '_controller' => 'App\\Controller\\OptionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        832 => [[['_route' => 'option_delete', '_controller' => 'App\\Controller\\OptionController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        857 => [[['_route' => 'post_index_lesson', '_controller' => 'App\\Controller\\PostController::getPostsByLesson'], ['lesson'], ['GET' => 0], null, false, true, null]],
        865 => [[['_route' => 'post_index_user', '_controller' => 'App\\Controller\\PostController::getPostsByUser'], ['user'], ['GET' => 0], null, false, true, null]],
        888 => [[['_route' => 'post_index_user_lesson', '_controller' => 'App\\Controller\\PostController::getPostsByUserAndLesson'], ['user', 'lesson'], ['GET' => 0], null, false, true, null]],
        900 => [[['_route' => 'post_new_lesson', '_controller' => 'App\\Controller\\PostController::LessonPost'], ['user', 'lesson'], ['POST' => 0], null, false, false, null]],
        912 => [[['_route' => 'post_new_user', '_controller' => 'App\\Controller\\PostController::UserPost'], ['user'], ['POST' => 0], null, false, false, null]],
        924 => [[['_route' => 'post_edit', '_controller' => 'App\\Controller\\PostController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        933 => [
            [['_route' => 'post_show', '_controller' => 'App\\Controller\\PostController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'post_delete', '_controller' => 'App\\Controller\\PostController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        968 => [[['_route' => 'question_index', '_controller' => 'App\\Controller\\QuestionController::index'], ['quiz'], ['GET' => 0], null, false, true, null]],
        983 => [[['_route' => 'question_new', '_controller' => 'App\\Controller\\QuestionController::new'], ['quiz'], ['POST' => 0], null, false, false, null]],
        995 => [[['_route' => 'question_edit', '_controller' => 'App\\Controller\\QuestionController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        1004 => [[['_route' => 'question_show', '_controller' => 'App\\Controller\\QuestionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1029 => [[['_route' => 'question_delete', '_controller' => 'App\\Controller\\QuestionController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1053 => [[['_route' => 'app_quiz_index', '_controller' => 'App\\Controller\\QuizController::index'], ['lesson'], ['GET' => 0], null, false, true, null]],
        1066 => [[['_route' => 'app_quiz_new', '_controller' => 'App\\Controller\\QuizController::new'], ['lesson'], ['POST' => 0], null, false, false, null]],
        1075 => [
            [['_route' => 'app_quiz_show', '_controller' => 'App\\Controller\\QuizController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_quiz_delete', '_controller' => 'App\\Controller\\QuizController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
