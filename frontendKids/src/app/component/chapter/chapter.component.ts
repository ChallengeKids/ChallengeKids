import { Component } from '@angular/core';
import { ChapterService } from 'src/app/service/chapter/chapter.service';

@Component({
  selector: 'app-chapter',
  templateUrl: './chapter.component.html',
  styleUrls: ['./chapter.component.scss']
})
export class ChapterComponent {

  public chapters: any;
  constructor(private chapterService: ChapterService) {}

  ngOnInit(): void {
    this.chapterService.getChapters()
    .subscribe((data) => {
    this.chapters = data;
    }, err => {
      console.log(err);
    });
  }
}
