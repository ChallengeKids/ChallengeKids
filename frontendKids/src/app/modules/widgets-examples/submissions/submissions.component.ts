import { Component } from "@angular/core";
import { lastValueFrom } from "rxjs";
import { HttpserviceService } from "../../auth/services/httpservice.service";
import {
  OnInit,
  AfterViewInit,
  ElementRef,
  ViewChild,
  TemplateRef,
  inject,
} from "@angular/core";

declare var $: any;
@Component({
  selector: 'app-submissions',
  templateUrl: './submissions.component.html',
})
export class SubmissionsComponent implements OnInit, AfterViewInit{
  selectedpost: any;
  confirmPassword: any;

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
  posts: any;
  constructor(private httpservice: HttpserviceService) {}

  async ngOnInit() {
    try {
      const response = await lastValueFrom(this.httpservice.get("/api/coach/all-submissions"));
      this.posts = response;
      console.log("Categories loaded:", this.posts);
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
  async delete(id: any) {
    try {
      const response = await lastValueFrom(
        this.httpservice.delete(`/api/category/delete/${id}`)
      );
      window.location.reload();
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
}
