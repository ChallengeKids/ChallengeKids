import { Component } from "@angular/core";
import { HttpserviceService } from "../../auth/services/httpservice.service";
import { lastValueFrom } from "rxjs";

@Component({
  selector: "app-chapter",
  templateUrl: "./chapter.component.html",
})
export class ChapterComponent {
  chapters: any;
  constructor(private httpservice: HttpserviceService) {}

  async ngOnInit() {
    try {
      const response = await lastValueFrom(
        this.httpservice.get("/api/chapter")
      );
      this.chapters = response;
      console.log("Categories loaded:", this.chapters);
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
  async delete(id: any) {
    try {
      const response = await lastValueFrom(
        this.httpservice.delete(`/api/chapter/delete/${id}`)
      );
      window.location.reload();
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
}
