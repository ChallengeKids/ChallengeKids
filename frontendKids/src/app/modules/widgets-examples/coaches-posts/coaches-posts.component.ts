import { Component } from "@angular/core";
import { lastValueFrom, of } from "rxjs";
import { HttpserviceService } from "../../auth/services/httpservice.service";
import {
  OnInit,
  AfterViewInit,
  ElementRef,
  ViewChild,
  TemplateRef,
  inject,
} from "@angular/core";
import { AuthService } from "../../auth";
import { HttpHeaders } from "@angular/common/http";

declare var $: any;

@Component({
  selector: "app-coaches-posts",
  templateUrl: "./coaches-posts.component.html",
})
export class CoachesPostsComponent {
  posts: any;
  constructor(
    private httpservice: HttpserviceService,
    private authservice: AuthService
  ) {}
  confirmPassword: any;
  selectedpost: any;
  @ViewChild("dataTable", { static: false }) tableElement: ElementRef;
  ngAfterViewInit() {
    $(this.tableElement.nativeElement).DataTable();
  }
  open() {
    throw new Error("Method not implemented.");
  }
  savepost() {
    throw new Error("Method not implemented.");
  }

  async ngOnInit() {
    try {
      const response = await lastValueFrom(
        this.httpservice.get("/api/post/user")
      );
      this.posts = response;
      console.log("Categories loaded:", this.posts);
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
  async delete(id: any) {
    try {
      const response = await lastValueFrom(
        this.httpservice.delete(`/api/post/${id}`)
      );
      window.location.reload();
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
}
