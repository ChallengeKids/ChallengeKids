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
import { ModalDismissReasons, NgbModal } from "@ng-bootstrap/ng-bootstrap";

declare var $: any;

@Component({
  selector: "app-coaches-posts",
  templateUrl: "./coaches-posts.component.html",
})
export class CoachesPostsComponent {
  title: string = "";
  content: string = "";
  mediaFile: File | null = null;
  Categories: string[] = []; // Add more categories as needed
  posts: any;
  closeResult = "";
  fakecategories: any;
  truecategories: any[] = [];
  confirmPassword: any;
  selectedpost: any = null;
  private modalService = inject(NgbModal);
  constructor(
    private httpservice: HttpserviceService,
    private authservice: AuthService
  ) {}
  @ViewChild("dataTable", { static: false }) tableElement: ElementRef;
  ngAfterViewInit() {
    $(this.tableElement.nativeElement).DataTable();
  }
  onFileSelected(event: any) {
    this.mediaFile = event.target.files[0];
  }

  addPost() {
    const formData = new FormData();
    formData.append("title", this.title);
    formData.append("content", this.content);
    if (this.mediaFile) {
      formData.append("mediaFileName", this.mediaFile, this.mediaFile.name);
    }
    for (let i = 0; i < this.Categories.length; i++) {
      formData.append("categories[]", this.Categories[i]);
    }

    // Log form data for debugging
    formData.forEach((value, key) => {
      console.log(`${key}: ${value}`);
    });

    this.httpservice.post("/api/post/user/new", formData).subscribe(
      (response) => {
        console.log("Post added successfully", response);
        // Handle success (e.g., show a success message, clear the form)
      },
      (error) => {
        console.error("Error adding post", error);
        // Handle error (e.g., show an error message)
      }
    );
  }
  onCategoryChange(category: { id: number; title: string; selected: boolean }) {
    if (category.selected) {
      this.Categories.push(category.title);
    } else {
      const index = this.Categories.indexOf(category.title);
      if (index !== -1) {
        this.Categories.splice(index, 1);
      }
    }
  }

  async ngOnInit() {
    try {
      const response = await lastValueFrom(
        this.httpservice.get("/api/post/user")
      );
      const response2 = await lastValueFrom(
        this.httpservice.get("/api/category")
      );
      this.fakecategories = response2;
      this.posts = response;
      for (let i = 0; i < this.fakecategories.length; i++) {
        let category = {};
        category["id"] = this.fakecategories[i]["id"];
        category["title"] = this.fakecategories[i]["title"];
        category["selected"] = false;
        this.truecategories.push(category);
      }
      console.log("Categories loaded:", this.truecategories);
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
  open(content: TemplateRef<any>) {
    this.modalService
      .open(content, {
        ariaLabelledBy: "modal-basic-title",
        centered: true,
        size: "lg",
      })
      .result.then(
        (result) => {
          this.closeResult = `Closed with: ${result}`;
        },
        (reason) => {
          this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
        }
      );
  }
  private getDismissReason(reason: any): string {
    switch (reason) {
      case ModalDismissReasons.ESC:
        return "by pressing ESC";
      case ModalDismissReasons.BACKDROP_CLICK:
        return "by clicking on a backdrop";
      default:
        return `with: ${reason}`;
    }
  }
}
