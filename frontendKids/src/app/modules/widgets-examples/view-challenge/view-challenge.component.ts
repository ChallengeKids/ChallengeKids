import { Component, ElementRef, TemplateRef, ViewChild } from "@angular/core";
import { HttpserviceService } from "../../auth/services/httpservice.service";
import { lastValueFrom, map } from "rxjs";
import { OnInit, AfterViewInit, inject } from "@angular/core";
import { ModalDismissReasons, NgbModal } from "@ng-bootstrap/ng-bootstrap";
import { ActivatedRoute } from "@angular/router";
declare var $: any;

@Component({
  selector: "app-view-challenge",
  templateUrl: "./view-challenge.component.html",
})
export class ViewChallengeComponent {
  private modalService = inject(NgbModal);
  closeResult: string;
  @ViewChild("dataTable", { static: false }) tableElement: ElementRef;
  chapters: any;
  title: any;
  desc: any = "";
  cnumber: number;
  challeneId: any;
  challenge: any;
  ngAfterViewInit() {
    $(this.tableElement.nativeElement).DataTable();
  }
  constructor(
    private httpservice: HttpserviceService,
    private route: ActivatedRoute
  ) {}
  async savechapter() {
    try {
      const body = {
        title: this.title,
        description: this.desc,
        chapterNumber: this.cnumber,
      };
      console.log(body);
      const response = await lastValueFrom(
        this.httpservice.post("/api/chapter/new", body)
      );
      window.location.reload();
      console.log("lesson added:", response);
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
  async ngOnInit() {
    this.route.params.subscribe((params) => {
      this.challeneId = params["id"];
    });
    try {
      const response = await lastValueFrom(
        this.httpservice.get(`/api/challenge/${this.challeneId}`)
      );
      this.challenge = response;
      this.chapters = this.challenge.chapters;
      console.log("Chapters loaded:", this.chapters);
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
