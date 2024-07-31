import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { WidgetsExamplesRoutingModule } from './widgets-examples-routing.module';
import { WidgetsExamplesComponent } from './widgets-examples.component';
import { ListsComponent } from './lists/lists.component';
import { StatisticsComponent } from './statistics/statistics.component';
import { ChartsComponent } from './charts/charts.component';
import { MixedComponent } from './mixed/mixed.component';
import { TablesComponent } from './tables/tables.component';
import { FeedsComponent } from './feeds/feeds.component';
import { WidgetsModule } from '../../_metronic/partials';
import { CategoryComponent } from './category/category.component';
import { FormsModule } from '@angular/forms';
import { lastValueFrom } from 'rxjs';
import { HttpserviceService } from '../auth/services/httpservice.service';
import { ChallengeComponent } from './challenge/challenge.component';

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
  ],
  imports: [
    CommonModule,
    WidgetsExamplesRoutingModule,
    WidgetsModule,
    FormsModule,
  ],
})
export class WidgetsExamplesModule {}
