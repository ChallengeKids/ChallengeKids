<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'category_index' => [[], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['text', '/api/category/']], [], [], []],
    'category_new' => [[], ['_controller' => 'App\\Controller\\CategoryController::new'], [], [['text', '/api/category/new']], [], [], []],
    'category_show' => [['type'], ['_controller' => 'App\\Controller\\CategoryController::show'], [], [['variable', '/', '[^/]++', 'type', true], ['text', '/api/category']], [], [], []],
    'category_delete' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/category/delete']], [], [], []],
    'challenge_index' => [[], ['_controller' => 'App\\Controller\\ChallengeController::index'], [], [['text', '/api/challenge/']], [], [], []],
    'challenge_new' => [[], ['_controller' => 'App\\Controller\\ChallengeController::new'], [], [['text', '/api/challenge/new']], [], [], []],
    'challenge_show' => [['title'], ['_controller' => 'App\\Controller\\ChallengeController::show'], [], [['variable', '/', '[^/]++', 'title', true], ['text', '/api/challenge']], [], [], []],
    'challenge_edit' => [['id'], ['_controller' => 'App\\Controller\\ChallengeController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/challenge']], [], [], []],
    'challenge_delete' => [['id'], ['_controller' => 'App\\Controller\\ChallengeController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/challenge/delete']], [], [], []],
    'chapter_index' => [[], ['_controller' => 'App\\Controller\\ChapterController::index'], [], [['text', '/api/chapter/']], [], [], []],
    'chapter_new' => [[], ['_controller' => 'App\\Controller\\ChapterController::new'], [], [['text', '/api/chapter/new']], [], [], []],
    'chapter_show' => [['title'], ['_controller' => 'App\\Controller\\ChapterController::show'], [], [['variable', '/', '[^/]++', 'title', true], ['text', '/api/chapter']], [], [], []],
    'chapter_edit' => [['id'], ['_controller' => 'App\\Controller\\ChapterController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/chapter']], [], [], []],
    'chapter_delete' => [['id'], ['_controller' => 'App\\Controller\\ChapterController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/chapter/delete']], [], [], []],
    'coach_index' => [[], ['_controller' => 'App\\Controller\\CoachController::index'], [], [['text', '/api/coach/']], [], [], []],
    'coach_show' => [['id'], ['_controller' => 'App\\Controller\\CoachController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/coach']], [], [], []],
    'coach_edit' => [['id'], ['_controller' => 'App\\Controller\\CoachController::changePassword'], [], [['text', '/changePassword'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/coach']], [], [], []],
    'coach_delete' => [['id'], ['_controller' => 'App\\Controller\\CoachController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/coach/delete']], [], [], []],
    'kid_index' => [[], ['_controller' => 'App\\Controller\\KidController::index'], [], [['text', '/api/kid/']], [], [], []],
    'kid_show' => [['id'], ['_controller' => 'App\\Controller\\KidController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kid']], [], [], []],
    'kid_edit' => [['id'], ['_controller' => 'App\\Controller\\KidController::changePassword'], [], [['text', '/changePassword'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/kid']], [], [], []],
    'kid_delete' => [['id'], ['_controller' => 'App\\Controller\\KidController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kid/delete']], [], [], []],
    'kid_parent_index' => [[], ['_controller' => 'App\\Controller\\KidParentController::index'], [], [['text', '/api/kidParent/']], [], [], []],
    'kid_parent_show' => [['id'], ['_controller' => 'App\\Controller\\KidParentController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kidParent']], [], [], []],
    'kid_parent_edit' => [['id'], ['_controller' => 'App\\Controller\\KidParentController::changePassword'], [], [['text', '/changePassword'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/kidParent']], [], [], []],
    'kid_parent_delete' => [['id'], ['_controller' => 'App\\Controller\\KidParentController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kidParent/delete']], [], [], []],
    'response_index' => [[], ['_controller' => 'App\\Controller\\KidResponseController::index'], [], [['text', '/api/kidResponse/']], [], [], []],
    'response_new' => [['kid', 'quiz'], ['_controller' => 'App\\Controller\\KidResponseController::new'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'quiz', true], ['variable', '/', '[^/]++', 'kid', true], ['text', '/api/kidResponse']], [], [], []],
    'response_show' => [['id'], ['_controller' => 'App\\Controller\\KidResponseController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kidResponse']], [], [], []],
    'lesson_index' => [[], ['_controller' => 'App\\Controller\\LessonController::index'], [], [['text', '/api/lesson/']], [], [], []],
    'lesson_new' => [[], ['_controller' => 'App\\Controller\\LessonController::new'], [], [['text', '/api/lesson/new']], [], [], []],
    'lesson_show' => [['title'], ['_controller' => 'App\\Controller\\LessonController::show'], [], [['variable', '/', '[^/]++', 'title', true], ['text', '/api/lesson']], [], [], []],
    'lesson_edit' => [['id'], ['_controller' => 'App\\Controller\\LessonController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/lesson']], [], [], []],
    'lesson_delete' => [['id'], ['_controller' => 'App\\Controller\\LessonController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/lesson/delete']], [], [], []],
    'option_index' => [['question'], ['_controller' => 'App\\Controller\\OptionController::index'], [], [['variable', '/', '[^/]++', 'question', true], ['text', '/api/option']], [], [], []],
    'option_new' => [['question'], ['_controller' => 'App\\Controller\\OptionController::new'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'question', true], ['text', '/api/option']], [], [], []],
    'option_show' => [['id'], ['_controller' => 'App\\Controller\\OptionController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/option']], [], [], []],
    'option_edit' => [['id'], ['_controller' => 'App\\Controller\\OptionController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/option']], [], [], []],
    'option_delete' => [['id'], ['_controller' => 'App\\Controller\\OptionController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/option/delete']], [], [], []],
    'post_index_lesson' => [['lesson'], ['_controller' => 'App\\Controller\\PostController::getPostsByLesson'], [], [['variable', '/', '[^/]++', 'lesson', true], ['text', '/api/post']], [], [], []],
    'post_index_user' => [['user'], ['_controller' => 'App\\Controller\\PostController::getPostsByUser'], [], [['variable', '/', '[^/]++', 'user', true], ['text', '/api/post']], [], [], []],
    'post_index_user_lesson' => [['user', 'lesson'], ['_controller' => 'App\\Controller\\PostController::getPostsByUserAndLesson'], [], [['variable', '/', '[^/]++', 'lesson', true], ['variable', '/', '[^/]++', 'user', true], ['text', '/api/post']], [], [], []],
    'post_new_lesson' => [['user', 'lesson'], ['_controller' => 'App\\Controller\\PostController::LessonPost'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'lesson', true], ['variable', '/', '[^/]++', 'user', true], ['text', '/api/post']], [], [], []],
    'post_new_user' => [['user'], ['_controller' => 'App\\Controller\\PostController::UserPost'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'user', true], ['text', '/api/post']], [], [], []],
    'post_show' => [['id'], ['_controller' => 'App\\Controller\\PostController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/post']], [], [], []],
    'post_edit' => [['id'], ['_controller' => 'App\\Controller\\PostController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/post']], [], [], []],
    'post_delete' => [['id'], ['_controller' => 'App\\Controller\\PostController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/post']], [], [], []],
    'question_index' => [['quiz'], ['_controller' => 'App\\Controller\\QuestionController::index'], [], [['variable', '/', '[^/]++', 'quiz', true], ['text', '/api/question']], [], [], []],
    'question_new' => [['quiz'], ['_controller' => 'App\\Controller\\QuestionController::new'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'quiz', true], ['text', '/api/question']], [], [], []],
    'question_show' => [['id'], ['_controller' => 'App\\Controller\\QuestionController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/question']], [], [], []],
    'question_edit' => [['id'], ['_controller' => 'App\\Controller\\QuestionController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/question']], [], [], []],
    'question_delete' => [['id'], ['_controller' => 'App\\Controller\\QuestionController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/question/delete']], [], [], []],
    'app_quiz_index' => [['lesson'], ['_controller' => 'App\\Controller\\QuizController::index'], [], [['variable', '/', '[^/]++', 'lesson', true], ['text', '/api/quiz']], [], [], []],
    'app_quiz_new' => [['lesson'], ['_controller' => 'App\\Controller\\QuizController::new'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'lesson', true], ['text', '/api/quiz']], [], [], []],
    'app_quiz_show' => [['id'], ['_controller' => 'App\\Controller\\QuizController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/quiz']], [], [], []],
    'app_quiz_delete' => [['id'], ['_controller' => 'App\\Controller\\QuizController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/quiz']], [], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/api/register']], [], [], []],
    'app_login_check' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/api/login_check']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/api/logout']], [], [], []],
    'app.swagger_ui' => [[], ['_controller' => 'nelmio_api_doc.controller.swagger_ui'], [], [['text', '/api/doc']], [], [], []],
    'app.redocly' => [[], ['_controller' => 'nelmio_api_doc.controller.redocly'], [], [['text', '/api/doc']], [], [], []],
    'app.swagger' => [[], ['_controller' => 'nelmio_api_doc.controller.swagger'], [], [['text', '/api/doc.json']], [], [], []],
    'api_login_check' => [[], [], [], [['text', '/api/login_check']], [], [], []],
    'App\Controller\CategoryController::index' => [[], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['text', '/api/category/']], [], [], []],
    'App\Controller\CategoryController::new' => [[], ['_controller' => 'App\\Controller\\CategoryController::new'], [], [['text', '/api/category/new']], [], [], []],
    'App\Controller\CategoryController::show' => [['type'], ['_controller' => 'App\\Controller\\CategoryController::show'], [], [['variable', '/', '[^/]++', 'type', true], ['text', '/api/category']], [], [], []],
    'App\Controller\CategoryController::delete' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/category/delete']], [], [], []],
    'App\Controller\ChallengeController::index' => [[], ['_controller' => 'App\\Controller\\ChallengeController::index'], [], [['text', '/api/challenge/']], [], [], []],
    'App\Controller\ChallengeController::new' => [[], ['_controller' => 'App\\Controller\\ChallengeController::new'], [], [['text', '/api/challenge/new']], [], [], []],
    'App\Controller\ChallengeController::show' => [['title'], ['_controller' => 'App\\Controller\\ChallengeController::show'], [], [['variable', '/', '[^/]++', 'title', true], ['text', '/api/challenge']], [], [], []],
    'App\Controller\ChallengeController::edit' => [['id'], ['_controller' => 'App\\Controller\\ChallengeController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/challenge']], [], [], []],
    'App\Controller\ChallengeController::delete' => [['id'], ['_controller' => 'App\\Controller\\ChallengeController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/challenge/delete']], [], [], []],
    'App\Controller\ChapterController::index' => [[], ['_controller' => 'App\\Controller\\ChapterController::index'], [], [['text', '/api/chapter/']], [], [], []],
    'App\Controller\ChapterController::new' => [[], ['_controller' => 'App\\Controller\\ChapterController::new'], [], [['text', '/api/chapter/new']], [], [], []],
    'App\Controller\ChapterController::show' => [['title'], ['_controller' => 'App\\Controller\\ChapterController::show'], [], [['variable', '/', '[^/]++', 'title', true], ['text', '/api/chapter']], [], [], []],
    'App\Controller\ChapterController::edit' => [['id'], ['_controller' => 'App\\Controller\\ChapterController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/chapter']], [], [], []],
    'App\Controller\ChapterController::delete' => [['id'], ['_controller' => 'App\\Controller\\ChapterController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/chapter/delete']], [], [], []],
    'App\Controller\CoachController::index' => [[], ['_controller' => 'App\\Controller\\CoachController::index'], [], [['text', '/api/coach/']], [], [], []],
    'App\Controller\CoachController::show' => [['id'], ['_controller' => 'App\\Controller\\CoachController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/coach']], [], [], []],
    'App\Controller\CoachController::changePassword' => [['id'], ['_controller' => 'App\\Controller\\CoachController::changePassword'], [], [['text', '/changePassword'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/coach']], [], [], []],
    'App\Controller\CoachController::delete' => [['id'], ['_controller' => 'App\\Controller\\CoachController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/coach/delete']], [], [], []],
    'App\Controller\KidController::index' => [[], ['_controller' => 'App\\Controller\\KidController::index'], [], [['text', '/api/kid/']], [], [], []],
    'App\Controller\KidController::show' => [['id'], ['_controller' => 'App\\Controller\\KidController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kid']], [], [], []],
    'App\Controller\KidController::changePassword' => [['id'], ['_controller' => 'App\\Controller\\KidController::changePassword'], [], [['text', '/changePassword'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/kid']], [], [], []],
    'App\Controller\KidController::delete' => [['id'], ['_controller' => 'App\\Controller\\KidController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kid/delete']], [], [], []],
    'App\Controller\KidParentController::index' => [[], ['_controller' => 'App\\Controller\\KidParentController::index'], [], [['text', '/api/kidParent/']], [], [], []],
    'App\Controller\KidParentController::show' => [['id'], ['_controller' => 'App\\Controller\\KidParentController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kidParent']], [], [], []],
    'App\Controller\KidParentController::changePassword' => [['id'], ['_controller' => 'App\\Controller\\KidParentController::changePassword'], [], [['text', '/changePassword'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/kidParent']], [], [], []],
    'App\Controller\KidParentController::delete' => [['id'], ['_controller' => 'App\\Controller\\KidParentController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kidParent/delete']], [], [], []],
    'App\Controller\KidResponseController::index' => [[], ['_controller' => 'App\\Controller\\KidResponseController::index'], [], [['text', '/api/kidResponse/']], [], [], []],
    'App\Controller\KidResponseController::new' => [['kid', 'quiz'], ['_controller' => 'App\\Controller\\KidResponseController::new'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'quiz', true], ['variable', '/', '[^/]++', 'kid', true], ['text', '/api/kidResponse']], [], [], []],
    'App\Controller\KidResponseController::show' => [['id'], ['_controller' => 'App\\Controller\\KidResponseController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/kidResponse']], [], [], []],
    'App\Controller\LessonController::index' => [[], ['_controller' => 'App\\Controller\\LessonController::index'], [], [['text', '/api/lesson/']], [], [], []],
    'App\Controller\LessonController::new' => [[], ['_controller' => 'App\\Controller\\LessonController::new'], [], [['text', '/api/lesson/new']], [], [], []],
    'App\Controller\LessonController::show' => [['title'], ['_controller' => 'App\\Controller\\LessonController::show'], [], [['variable', '/', '[^/]++', 'title', true], ['text', '/api/lesson']], [], [], []],
    'App\Controller\LessonController::edit' => [['id'], ['_controller' => 'App\\Controller\\LessonController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/lesson']], [], [], []],
    'App\Controller\LessonController::delete' => [['id'], ['_controller' => 'App\\Controller\\LessonController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/lesson/delete']], [], [], []],
    'App\Controller\OptionController::index' => [['question'], ['_controller' => 'App\\Controller\\OptionController::index'], [], [['variable', '/', '[^/]++', 'question', true], ['text', '/api/option']], [], [], []],
    'App\Controller\OptionController::new' => [['question'], ['_controller' => 'App\\Controller\\OptionController::new'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'question', true], ['text', '/api/option']], [], [], []],
    'App\Controller\OptionController::show' => [['id'], ['_controller' => 'App\\Controller\\OptionController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/option']], [], [], []],
    'App\Controller\OptionController::edit' => [['id'], ['_controller' => 'App\\Controller\\OptionController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/option']], [], [], []],
    'App\Controller\OptionController::delete' => [['id'], ['_controller' => 'App\\Controller\\OptionController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/option/delete']], [], [], []],
    'App\Controller\PostController::getPostsByLesson' => [['lesson'], ['_controller' => 'App\\Controller\\PostController::getPostsByLesson'], [], [['variable', '/', '[^/]++', 'lesson', true], ['text', '/api/post']], [], [], []],
    'App\Controller\PostController::getPostsByUser' => [['user'], ['_controller' => 'App\\Controller\\PostController::getPostsByUser'], [], [['variable', '/', '[^/]++', 'user', true], ['text', '/api/post']], [], [], []],
    'App\Controller\PostController::getPostsByUserAndLesson' => [['user', 'lesson'], ['_controller' => 'App\\Controller\\PostController::getPostsByUserAndLesson'], [], [['variable', '/', '[^/]++', 'lesson', true], ['variable', '/', '[^/]++', 'user', true], ['text', '/api/post']], [], [], []],
    'App\Controller\PostController::LessonPost' => [['user', 'lesson'], ['_controller' => 'App\\Controller\\PostController::LessonPost'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'lesson', true], ['variable', '/', '[^/]++', 'user', true], ['text', '/api/post']], [], [], []],
    'App\Controller\PostController::UserPost' => [['user'], ['_controller' => 'App\\Controller\\PostController::UserPost'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'user', true], ['text', '/api/post']], [], [], []],
    'App\Controller\PostController::show' => [['id'], ['_controller' => 'App\\Controller\\PostController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/post']], [], [], []],
    'App\Controller\PostController::edit' => [['id'], ['_controller' => 'App\\Controller\\PostController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/post']], [], [], []],
    'App\Controller\PostController::delete' => [['id'], ['_controller' => 'App\\Controller\\PostController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/post']], [], [], []],
    'App\Controller\QuestionController::index' => [['quiz'], ['_controller' => 'App\\Controller\\QuestionController::index'], [], [['variable', '/', '[^/]++', 'quiz', true], ['text', '/api/question']], [], [], []],
    'App\Controller\QuestionController::new' => [['quiz'], ['_controller' => 'App\\Controller\\QuestionController::new'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'quiz', true], ['text', '/api/question']], [], [], []],
    'App\Controller\QuestionController::show' => [['id'], ['_controller' => 'App\\Controller\\QuestionController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/question']], [], [], []],
    'App\Controller\QuestionController::edit' => [['id'], ['_controller' => 'App\\Controller\\QuestionController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/api/question']], [], [], []],
    'App\Controller\QuestionController::delete' => [['id'], ['_controller' => 'App\\Controller\\QuestionController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/question/delete']], [], [], []],
    'App\Controller\QuizController::index' => [['lesson'], ['_controller' => 'App\\Controller\\QuizController::index'], [], [['variable', '/', '[^/]++', 'lesson', true], ['text', '/api/quiz']], [], [], []],
    'App\Controller\QuizController::new' => [['lesson'], ['_controller' => 'App\\Controller\\QuizController::new'], [], [['text', '/new'], ['variable', '/', '[^/]++', 'lesson', true], ['text', '/api/quiz']], [], [], []],
    'App\Controller\QuizController::show' => [['id'], ['_controller' => 'App\\Controller\\QuizController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/quiz']], [], [], []],
    'App\Controller\QuizController::delete' => [['id'], ['_controller' => 'App\\Controller\\QuizController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/quiz']], [], [], []],
    'App\Controller\RegistrationController::register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/api/register']], [], [], []],
    'App\Controller\SecurityController::login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/api/login_check']], [], [], []],
    'App\Controller\SecurityController::logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/api/logout']], [], [], []],
];
