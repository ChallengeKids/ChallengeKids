import { Component, OnInit, TemplateRef } from '@angular/core';
import { HttpserviceService } from '../../auth/services/httpservice.service';
import { AuthService } from '../../auth';
import { NgbModal, ModalDismissReasons } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-coaches-posts',
  templateUrl: './coaches-posts.component.html',
  styleUrls: ['./coaches-posts.component.scss'],
})
export class CoachesPostsComponent implements OnInit {
  title: string = "";
  thecontent: string = "";  // This is bound to the Quill editor
  mediaFile: File | null = null;
  Categories: string[] = [];
  posts: any;
  closeResult = "";
  fakecategories: any;
  truecategories: any[] = [];
  confirmPassword: any;
  selectedpost: any = null;

  quillConfig = {
    toolbar: [
      ['bold', 'italic', 'underline'],
      [{ 'header': [1, 2, false] }],
      [{ 'list': 'ordered' }, { 'list': 'bullet' }],
      ['link', 'image'],
      ['clean']
    ]
  };

  constructor(
    private httpservice: HttpserviceService,
    private authservice: AuthService,
    private modalService: NgbModal
  ) {}

  ngOnInit() {
    this.loadCategoriesAndPosts();
  }

  async loadCategoriesAndPosts() {
    try {
      const response = await this.httpservice.get("/api/post/user").toPromise();
      const response2 = await this.httpservice.get("/api/category").toPromise();
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

  onFileSelected(event: any) {
    this.mediaFile = event.target.files[0];
  }

  addPost() {
    console.log("Categories to be added:", this.Categories);

    const formData = new FormData();
    formData.append("title", this.title);
    formData.append("content", this.thecontent);  // Content from Quill editor
    if (this.mediaFile) {
      formData.append("mediaFileName", this.mediaFile, this.mediaFile.name);
    }
    formData.append("categories", JSON.stringify(this.Categories));

    formData.forEach((value, key) => {
      console.log(`${key}: ${value}`);
    });

    this.httpservice.post("/api/post/user/new", formData).subscribe(
      (response) => {
        console.log("Post added successfully", response);
      },
      (error) => {
        console.error("Error adding post", error);
      }
    );
    window.location.reload();
  }

  onCategoryChange(category: { id: number; title: string; selected: boolean }) {
    category.selected = !category.selected;

    console.log("Category changed:", category.title, "Selected:", category.selected);

    if (category.selected) {
      if (!this.Categories.includes(category.title)) {
        this.Categories.push(category.title);
      }
    } else {
      const index = this.Categories.indexOf(category.title);
      if (index !== -1) {
        this.Categories.splice(index, 1);
      }
    }

    console.log("Current Categories:", this.Categories);
  }

  async delete(id: any) {
    try {
      const response = await this.httpservice.delete(`/api/post/${id}`).toPromise();
      window.location.reload();
    } catch (error) {
      console.error("Error deleting post:", error);
    }
  }

  open(content: TemplateRef<any>) {
    this.modalService.open(content, {
      ariaLabelledBy: 'modal-basic-title',
      centered: true,
      size: 'lg',
    }).result.then(
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
        return 'by pressing ESC';
      case ModalDismissReasons.BACKDROP_CLICK:
        return 'by clicking on a backdrop';
      default:
        return `with: ${reason}`;
    }
  }
}
