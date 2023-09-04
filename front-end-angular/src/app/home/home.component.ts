import {
    Component,
    OnInit,
    ViewChild,
    ElementRef,
    OnDestroy
} from '@angular/core'; import { first } from 'rxjs/operators';

import { VideoService } from '@app/_services';
import { FormBuilder, FormGroup } from '@angular/forms';
import { VirtualTimeScheduler } from 'rxjs';
import { AnimationPlayer } from '@angular/animations';


@Component({ templateUrl: 'home.component.html' })
export class HomeComponent {
    searchForm!: FormGroup;
    videos: any = [];
    reports: any = [];
    constructor(private videoService: VideoService, private formBuilder: FormBuilder) {
    }

    ngOnInit() {

        this.loadAllVideos();
        this.loadAllReports();
    }
    loadAllVideos() {
        this.videoService.allVideos().pipe(first()).subscribe(response => {
            this.createForm(response);
            this.videos = response;

        });
    }
    loadAllReports() {
        this.videoService.allReports().pipe(first()).subscribe(response => {
            this.reports = response;
        });
    }

    createForm(response: any) {

        const entries: any = [];
        response.forEach((element: any) => {
            entries.push(['views_' + element.id, ['']])
            entries.push([`${element.id}`, ['']])
        });
        const obj = Object.fromEntries(entries);
        this.searchForm = this.formBuilder.group(obj);
    }

    submitForm() {
        console.log(this.searchForm.value)
        let data: any = []
        Object.entries(this.searchForm.value).filter((element: any) => {
            if (element['1'] === true && this.searchForm.get("views_" + element['0'])?.value) {
                data.push([element['0'], this.searchForm.get("views_" + element['0'])?.value])
            }
        });

        const obj = Object.fromEntries(data);
        this.createReport(obj);
    }

    changeValueCheck(videoId: any) {
        if (!this.searchForm.get(`${videoId}`)?.value) {
            this.searchForm.get("views_" + videoId)?.setValue('')
        }
    }

    createReport(obj : any) {
        this.videoService.createReport(obj).pipe(first()).subscribe(response => {
            location.reload();
        });
    }

    joinFolders(folders : any) {
        return folders.map((f : any) => f.name).join(', ')
    }
}