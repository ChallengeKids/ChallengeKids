import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { WidgetsExamplesRoutingModule } from "./widgets-examples-routing.module";
import { WidgetsModule } from "../../_metronic/partials";
import { FormsModule } from "@angular/forms";
import { AccountModule } from "../account/account.module";
import { InlineSVGModule } from "ng-inline-svg-2";
import { WidgetsExamplesComponent } from "./widgets-examples.component";
import { ListsComponent } from "./lists/lists.component";
import { StatisticsComponent } from "./statistics/statistics.component";
import { ChartsComponent } from "./charts/charts.component";
import { MixedComponent } from "./mixed/mixed.component";
import { TablesComponent } from "./tables/tables.component";
import { FeedsComponent } from "./feeds/feeds.component";
import { CategoryComponent } from "./category/category.component";
import { ChallengeComponent } from "./challenge/challenge.component";
import { CoachComponent } from "./coach/coach.component";
import { PostComponent } from "./post/post.component";
import { ChapterComponent } from "./chapter/chapter.component";
import { LessonComponent } from "./lesson/lesson.component";
import { KidComponent } from "./kid/kid.component";
import { CoachesPostsComponent } from "./coaches-posts/coaches-posts.component";
import { CoachLessonComponent } from "./coach-lesson/coach-lesson.component";
import { CoachChapterComponent } from "./coach-chapter/coach-chapter.component";
import { CoachchallengeComponent } from "./coachchallenge/coachchallenge.component";
import { ReactiveFormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    WidgetsExamplesComponent,
    //ListsComponent,
    StatisticsComponent,
    ChartsComponent,
    MixedComponent,
    TablesComponent,
    FeedsComponent,
    CategoryComponent,
    ChallengeComponent,
    CoachComponent,
    PostComponent,
    ChapterComponent,
    LessonComponent,
    KidComponent,
    CoachesPostsComponent,
    CoachLessonComponent,
    CoachChapterComponent,
    CoachchallengeComponent,
  ],
  imports: [
    CommonModule,
    WidgetsExamplesRoutingModule,
    WidgetsModule,
    FormsModule,
    AccountModule,
    InlineSVGModule,
    ReactiveFormsModule
  ],
  exports: [
    CategoryComponent,
    ChallengeComponent,
    CoachComponent,
    PostComponent,
    ChapterComponent,
    LessonComponent,
    KidComponent,
  ],
})
export class WidgetsExamplesModule {}
