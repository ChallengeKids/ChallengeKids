import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { WidgetsExamplesRoutingModule } from "./widgets-examples-routing.module";
import { WidgetsExamplesComponent } from "./widgets-examples.component";
import { ListsComponent } from "./lists/lists.component";
import { StatisticsComponent } from "./statistics/statistics.component";
import { ChartsComponent } from "./charts/charts.component";
import { MixedComponent } from "./mixed/mixed.component";
import { TablesComponent } from "./tables/tables.component";
import { FeedsComponent } from "./feeds/feeds.component";
import { WidgetsModule } from "../../_metronic/partials";
import { CategoryComponent } from "./category/category.component";
import { FormsModule } from "@angular/forms";
import { ChallengeComponent } from "./challenge/challenge.component";
import { CoachComponent } from "./coach/coach.component";
import { AccountModule } from "../account/account.module";
import { InlineSVGModule } from "ng-inline-svg-2";
import { PostComponent } from "./post/post.component";
import { ChapterComponent } from "./chapter/chapter.component";
import { LessonComponent } from "./lesson/lesson.component";
import { KidComponent } from "./kid/kid.component";

@NgModule({
  declarations: [
    WidgetsExamplesComponent,
    ListsComponent,
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
  ],
  imports: [
    CommonModule,
    WidgetsExamplesRoutingModule,
    WidgetsModule,
    FormsModule,
    AccountModule,
    InlineSVGModule,
  ],
})
export class WidgetsExamplesModule {}
