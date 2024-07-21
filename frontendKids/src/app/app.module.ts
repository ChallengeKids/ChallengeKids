import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HttpClientModule } from '@angular/common/http';
import { ChapterComponent } from './component/chapter/chapter.component';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { path: 'chapter', component: ChapterComponent }
];
@NgModule({
  declarations: [
    AppComponent,
    ChapterComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    RouterModule.forRoot(routes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
