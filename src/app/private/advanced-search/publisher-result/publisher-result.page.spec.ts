import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { PublisherResultPage } from './publisher-result.page';

describe('PublisherResultPage', () => {
  let component: PublisherResultPage;
  let fixture: ComponentFixture<PublisherResultPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PublisherResultPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(PublisherResultPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
