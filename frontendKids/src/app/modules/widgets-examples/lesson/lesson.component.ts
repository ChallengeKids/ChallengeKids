import { Component } from "@angular/core";
import { HttpserviceService } from "../../auth/services/httpservice.service";
import { lastValueFrom } from "rxjs";

@Component({
  selector: "app-lesson",

  templateUrl: "./lesson.component.html",
})
export class LessonComponent {
  lessons: any;
  constructor(private httpservice: HttpserviceService) {}

  async ngOnInit() {
    try {
      const response = await lastValueFrom(
        this.httpservice.get("/api/chapter")
      );
      this.lessons = response;
      console.log("Categories loaded:", this.lessons);
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
  async delete(id: any) {
    try {
      const response = await lastValueFrom(
        this.httpservice.delete(`/api/lesson/delete/${id}`)
      );
      window.location.reload();
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
}
