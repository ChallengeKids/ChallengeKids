import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";
import { ChartsComponent } from "./charts/charts.component";
import { FeedsComponent } from "./feeds/feeds.component";
import { ListsComponent } from "./lists/lists.component";
import { MixedComponent } from "./mixed/mixed.component";
import { StatisticsComponent } from "./statistics/statistics.component";
import { TablesComponent } from "./tables/tables.component";
import { WidgetsExamplesComponent } from "./widgets-examples.component";
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

const routes: Routes = [
  {
    path: "",
    component: WidgetsExamplesComponent,
    children: [
      { path: "coachesposts", component: CoachesPostsComponent },
      { path: "coachLessons", component: CoachLessonComponent },
      {
        path: "lists",
        component: ListsComponent,
      },
      {
        path: "chapters",
        component: CoachChapterComponent,
      },
      {
        path: "challenges",
        component: CoachchallengeComponent,
      },
      {
        path: "kids",
        component: KidComponent,
      },
      {
        path: "lessons",
        component: LessonComponent,
      },
      {
        path: "chapters",
        component: ChapterComponent,
      },
      {
        path: "posts",
        component: PostComponent,
      },
      {
        path: "challenges",
        component: ChallengeComponent,
      },
      {
        path: "category",
        component: CategoryComponent,
      },
      {
        path: "statistics",
        component: StatisticsComponent,
      },
      {
        path: "charts",
        component: ChartsComponent,
      },
      {
        path: "mixed",
        component: MixedComponent,
      },
      {
        path: "tables",
        component: TablesComponent,
      },
      {
        path: "feeds",
        component: FeedsComponent,
      },
      {
        path: "coach",
        component: CoachComponent,
      },
      { path: "", redirectTo: "lists", pathMatch: "full" },
      { path: "**", redirectTo: "lists", pathMatch: "full" },
    ],
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class WidgetsExamplesRoutingModule {}
